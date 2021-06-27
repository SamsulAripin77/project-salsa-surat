<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanHarianRequest;
use App\Http\Requests\StoreLaporanHarianRequest;
use App\Http\Requests\UpdateLaporanHarianRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanHarianController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_harian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanHarians.index');
    }

    public function create()
    {
        abort_if(Gate::denies('laporan_harian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanHarians.create');
    }

    public function store(StoreLaporanHarianRequest $request)
    {
        $laporanHarian = LaporanHarian::create($request->all());

        return redirect()->route('admin.laporan-harians.index');
    }

    public function edit(LaporanHarian $laporanHarian)
    {
        abort_if(Gate::denies('laporan_harian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanHarians.edit', compact('laporanHarian'));
    }

    public function update(UpdateLaporanHarianRequest $request, LaporanHarian $laporanHarian)
    {
        $laporanHarian->update($request->all());

        return redirect()->route('admin.laporan-harians.index');
    }

    public function show(LaporanHarian $laporanHarian)
    {
        abort_if(Gate::denies('laporan_harian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanHarians.show', compact('laporanHarian'));
    }

    public function destroy(LaporanHarian $laporanHarian)
    {
        abort_if(Gate::denies('laporan_harian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanHarian->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaporanHarianRequest $request)
    {
        LaporanHarian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
