<?php

namespace App\Http\Controllers\Admin;

use App\{SuratKeluar,kategori};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $surats = SuratKeluar::simplePaginate(5);
        return view('admin.surats.index', ['surats' => $surats, 'label'=> $this->label]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
                            'kategori_id' => $request->get('kategori_id'),
                            'user_id' => Auth::id()]);
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
       $surat = SuratKeluar::findOrFail($id);
       $surat->delete();

       return back();
    }
}
