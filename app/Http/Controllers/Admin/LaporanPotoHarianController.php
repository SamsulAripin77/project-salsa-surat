<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanPotoHarianRequest;
use App\Http\Requests\StoreLaporanPotoHarianRequest;
use App\Http\Requests\UpdateLaporanPotoHarianRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanPotoHarianController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_poto_harian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanPotoHarians.index');
    }

    public function create()
    {
        abort_if(Gate::denies('laporan_poto_harian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanPotoHarians.create');
    }

    public function store(StoreLaporanPotoHarianRequest $request)
    {
        $laporanPotoHarian = LaporanPotoHarian::create($request->all());

        return redirect()->route('admin.laporan-poto-harians.index');
    }

    public function edit(LaporanPotoHarian $laporanPotoHarian)
    {
        abort_if(Gate::denies('laporan_poto_harian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanPotoHarians.edit', compact('laporanPotoHarian'));
    }

    public function update(UpdateLaporanPotoHarianRequest $request, LaporanPotoHarian $laporanPotoHarian)
    {
        $laporanPotoHarian->update($request->all());

        return redirect()->route('admin.laporan-poto-harians.index');
    }

    public function show(LaporanPotoHarian $laporanPotoHarian)
    {
        abort_if(Gate::denies('laporan_poto_harian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanPotoHarians.show', compact('laporanPotoHarian'));
    }

    public function destroy(LaporanPotoHarian $laporanPotoHarian)
    {
        abort_if(Gate::denies('laporan_poto_harian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanPotoHarian->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaporanPotoHarianRequest $request)
    {
        LaporanPotoHarian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
