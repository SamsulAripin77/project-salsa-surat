<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanBulanPegawaiRequest;
use App\Http\Requests\StoreLaporanBulanPegawaiRequest;
use App\Http\Requests\UpdateLaporanBulanPegawaiRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanBulanPegawaiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_bulan_pegawai_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanBulanPegawais.index');
    }

    public function create()
    {
        abort_if(Gate::denies('laporan_bulan_pegawai_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanBulanPegawais.create');
    }

    public function store(StoreLaporanBulanPegawaiRequest $request)
    {
        $laporanBulanPegawai = LaporanBulanPegawai::create($request->all());

        return redirect()->route('admin.laporan-bulan-pegawais.index');
    }

    public function edit(LaporanBulanPegawai $laporanBulanPegawai)
    {
        abort_if(Gate::denies('laporan_bulan_pegawai_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanBulanPegawais.edit', compact('laporanBulanPegawai'));
    }

    public function update(UpdateLaporanBulanPegawaiRequest $request, LaporanBulanPegawai $laporanBulanPegawai)
    {
        $laporanBulanPegawai->update($request->all());

        return redirect()->route('admin.laporan-bulan-pegawais.index');
    }

    public function show(LaporanBulanPegawai $laporanBulanPegawai)
    {
        abort_if(Gate::denies('laporan_bulan_pegawai_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanBulanPegawais.show', compact('laporanBulanPegawai'));
    }

    public function destroy(LaporanBulanPegawai $laporanBulanPegawai)
    {
        abort_if(Gate::denies('laporan_bulan_pegawai_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanBulanPegawai->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaporanBulanPegawaiRequest $request)
    {
        LaporanBulanPegawai::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
