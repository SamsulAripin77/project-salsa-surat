<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{SuratKeluar,Kategori};
use Illuminate\Support\Facades\Auth;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PengarahanSuratKeluarController extends Controller
{
    private $label = 'Surat Keluar';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('pengarahan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $surats = SuratKeluar::simplePaginate(5);
        return view('admin.pengarahans.index', ['surats' => $surats, 'label'=> $this->label]);
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\SuratMasuk  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKeluar $suratKeluar, $id)
    {
        abort_if(Gate::denies('pengarahan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $surat = SuratKeluar::find($id);
        return view('admin.pengarahans.show',['surat' => $surat,'label'=>$this->label]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratMasuk  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKeluar $suratKeluar, $id)
    {
        abort_if(Gate::denies('pengarahan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $surat = SuratKeluar::findOrFail($id);
        $kategoris = Kategori::all()->pluck('nama','id')->prepend('Pilih kategori','');
        return view('admin.pengarahans.edit',['surat'=>$surat,'kategoris'=>$kategoris,'label'=>$this->label]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratMasuk  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suratkeluar $suratKeluar, $id)
    {   
        $surat = Suratkeluar::find($id);

        if ($request->get('penerima')){
            $surat->update([
                'penerima' => $request->get('penerima'),
                'penanggug_jawab' => $request->get('penanggung_jawab'),
                'alamat' => $request->get('alamat'),
                'user_id' => Auth::id()
            ]);
        }else {
            $surat->update([
                'keterangan' => $request->get('keterangan'),
                'status' => $request->get('status'),
                'user_id' => Auth::id()
            ]);
        }
        return redirect()->route('admin.pengarahansuratkeluars.index')->with('message','Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratMasuk  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratKeluar $suratKeluar, $id)
    {
       $surat = SuratKeluar::findOrFail($id);
       $surat->delete();

       return back();
    }
}
