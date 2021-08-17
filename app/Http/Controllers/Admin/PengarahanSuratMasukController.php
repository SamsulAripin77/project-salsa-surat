<?php

namespace App\Http\Controllers\Admin;
use App\{SuratMasuk,Kategori};
use Illuminate\Support\Facades\Auth;
use App\Models\{User,UserAlert};
use Illuminate\Database\Eloquent\Builder;
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
        $surats = SuratMasuk::latest()->simplePaginate(10);
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
        $penerimas = User::with(['roles'])->whereHas('roles', function (Builder $query) {
            $query->where('title', '=', 'penerima');
        })->get();
        return view('admin.pengarahans.edit',['surat'=>$surat,'kategoris'=>$kategoris,'label'=>$this->label, 'penerimas' => $penerimas]);
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
                'keterangan' => $request->get('keterangan'),
                'bidang' => $request->get('bidang'),
                'user_id' => Auth::id()
            ]);
            $userAlert = UserAlert::create([
                'alert_text' => 'surat masuk ditanggapi sekertaris',
            ]);
            $roles = User::with(['roles'])->whereHas('roles', function (Builder $query) {
                $query->where('title', '=', 'petugas_arsip');
            })->pluck('id')->toArray();
            $userAlert->users()->sync($roles);
        }else {
            $surat->update([
                'status' => $request->get('status'),
                'user_id' => Auth::id()
            ]);
            $userAlert = UserAlert::create([
                'alert_text' => 'surat masuk ditanggapi petugas arsip',
            ]);
            $roles = User::with(['roles'])->whereHas('roles', function (Builder $query) {
                $query->where('title', '=', 'sekertaris');
            })->pluck('id')->toArray();
            $userAlert->users()->sync($roles);
        }

     

        return redirect()->route('admin.pengarahansuratmasuks.index')->with('message','Update Berhasil');
    }


}
