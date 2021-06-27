<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanPeriodikRequest;
use App\Http\Requests\StoreLaporanPeriodikRequest;
use App\Http\Requests\UpdateLaporanPeriodikRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanPeriodikController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_periodik_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanPeriodiks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('laporan_periodik_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanPeriodiks.create');
    }

    public function store(StoreLaporanPeriodikRequest $request)
    {
        $laporanPeriodik = LaporanPeriodik::create($request->all());

        return redirect()->route('admin.laporan-periodiks.index');
    }

    public function edit(LaporanPeriodik $laporanPeriodik)
    {
        abort_if(Gate::denies('laporan_periodik_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanPeriodiks.edit', compact('laporanPeriodik'));
    }

    public function update(UpdateLaporanPeriodikRequest $request, LaporanPeriodik $laporanPeriodik)
    {
        $laporanPeriodik->update($request->all());

        return redirect()->route('admin.laporan-periodiks.index');
    }

    public function show(LaporanPeriodik $laporanPeriodik)
    {
        abort_if(Gate::denies('laporan_periodik_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanPeriodiks.show', compact('laporanPeriodik'));
    }

    public function destroy(LaporanPeriodik $laporanPeriodik)
    {
        abort_if(Gate::denies('laporan_periodik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanPeriodik->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaporanPeriodikRequest $request)
    {
        LaporanPeriodik::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
