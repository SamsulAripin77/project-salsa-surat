<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanBulananRequest;
use App\Http\Requests\StoreLaporanBulananRequest;
use App\Http\Requests\UpdateLaporanBulananRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanBulananController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_bulanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanBulanans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('laporan_bulanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanBulanans.create');
    }

    public function store(StoreLaporanBulananRequest $request)
    {
        $laporanBulanan = LaporanBulanan::create($request->all());

        return redirect()->route('admin.laporan-bulanans.index');
    }

    public function edit(LaporanBulanan $laporanBulanan)
    {
        abort_if(Gate::denies('laporan_bulanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanBulanans.edit', compact('laporanBulanan'));
    }

    public function update(UpdateLaporanBulananRequest $request, LaporanBulanan $laporanBulanan)
    {
        $laporanBulanan->update($request->all());

        return redirect()->route('admin.laporan-bulanans.index');
    }

    public function show(LaporanBulanan $laporanBulanan)
    {
        abort_if(Gate::denies('laporan_bulanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanBulanans.show', compact('laporanBulanan'));
    }

    public function destroy(LaporanBulanan $laporanBulanan)
    {
        abort_if(Gate::denies('laporan_bulanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanBulanan->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaporanBulananRequest $request)
    {
        LaporanBulanan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
