<?php

namespace App\Http\Controllers\Admin;
use App\{SuratMasuk,Kategori};
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PengarahanSuratMasukController extends Controller
{
    private $label = 'Surat Masuk';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('pengarahan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $surats = SuratMasuk::simplePaginate(5);
        return view('admin.pengarahans.index', ['surats' => $surats, 'label'=> $this->label]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(SuratMasuk $suratMasuk, $id)
    {
        abort_if(Gate::denies('pengarahan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $surat = SuratMasuk::find($id);
        return view('admin.pengarahans.show',['surat' => $surat,'label'=>$this->label]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratMasuk $suratMasuk, $id)
    {
        abort_if(Gate::denies('pengarahan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $surat = SuratMasuk::findOrFail($id);
        $kategoris = Kategori::all()->pluck('nama','id')->prepend('Pilih kategori','');
        return view('admin.pengarahans.edit',['surat'=>$surat,'kategoris'=>$kategoris,'label'=>$this->label]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratMasuk $suratMasuk, $id)
    {   
        $surat = SuratMasuk::find($id);

        if ($request->get('penerima')){
            $surat->update([
                'penerima' => $request->get('penerima'),
                'bidang' => $request->get('bidang'),
                'user_id' => Auth::id()
            ]);
        }else {
            $surat->update([
                'keterangan' => $request->get('keterangan'),
                'status' => $request->get('status'),
                'user_id' => Auth::id()
            ]);
        }

     

        return redirect()->route('admin.pengarahansuratmasuks.index')->with('message','Update Berhasil');
    }


}
