<?php

namespace App\Http\Controllers\Admin;

use App\{SuratKeluar,Kategori};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,UserAlert};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SuratKeluarController extends Controller
{
    private $label = 'Surat Keluar';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('surat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $surats = SuratKeluar::latest()->simplePaginate(10);
        return view('admin.surats.index', ['surats' => $surats, 'label'=> $this->label]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('surat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $kategoris = Kategori::all()->pluck('nama','id')->prepend('Pilih kategori','');
        return view('admin.surats.create',['kategoris'=>$kategoris, 'label'=> $this->label]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
        ]);
        $path = $request->file('lampiran')->store('public/lampiran');
        SuratKeluar::create(['lampiran'=> $path,
                            'tgl_surat' => $request->get('tgl_surat'),
                            'no_surat' => $request->get('no_surat'),
                            'hal' => $request->get('hal'),
                            'penerima' => $request->get('penerima'),
                            'kategori_id' => $request->get('kategori_id'),
                            'user_id' => Auth::id()]);

        $userAlert = UserAlert::create([
            'alert_text' => 'surat keluar baru untuk di periksa',
        ]);
        $roles = User::with(['roles'])->whereHas('roles', function (Builder $query) {
            $query->where('title', '=', 'sekertaris');
        })->pluck('id')->toArray();
        $userAlert->users()->sync($roles);
        return redirect()->route('admin.suratkeluars.index')->with('message','Input Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratKeluar  $SuratKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKeluar $SuratKeluar, $id)
    {
        abort_if(Gate::denies('surat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $surat = SuratKeluar::find($id);
        return view('admin.surats.show',['surat' => $surat,'label'=>$this->label]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratKeluar  $SuratKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKeluar $SuratKeluar, $id)
    {
        abort_if(Gate::denies('surat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $surat = SuratKeluar::findOrFail($id);
        $kategoris = Kategori::all()->pluck('nama','id')->prepend('Pilih kategori','');
        return view('admin.surats.edit',['surat'=>$surat,'kategoris'=>$kategoris,'label'=>$this->label]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratKeluar  $SuratKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratKeluar $SuratKeluar, $id)
    {   
        $surat = SuratKeluar::find($id);
        if($request->hasFile('lampiran')){
            $path = $request->file('lampiran')->store('public/lampiran');
            $lampiran = $path;
        }else {
            $lampiran = $surat->lampiran;
        }


        $surat->update([
                            'lampiran'=> $lampiran,
                            'tgl_surat' => $request->get('tgl_surat'),
                            'no_surat' => $request->get('no_surat'),
                            'hal' => $request->get('hal'),
                            'penerima' => $request->get('penerima'),
                            'kategori_id' => $request->get('kategori_id'),
                            'user_id' => Auth::id()
        ]);

        return redirect()->route('admin.suratkeluars.index')->with('message','Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratKeluar  $SuratKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratKeluar $SuratKeluar, $id)
    {
       abort_if(Gate::denies('surat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $surat = SuratKeluar::findOrFail($id);
       $surat->delete();

       return back();
    }
    public function laporan () {
        $surats = SuratKeluar::all();
        return view('admin.laporan.laporan', ['surats' => $surats, 'label'=> $this->label]);
    }
}
