<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanResumeBulananRequest;
use App\Http\Requests\StoreLaporanResumeBulananRequest;
use App\Http\Requests\UpdateLaporanResumeBulananRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanResumeBulananController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_resume_bulanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanResumeBulanans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('laporan_resume_bulanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanResumeBulanans.create');
    }

    public function store(StoreLaporanResumeBulananRequest $request)
    {
        $laporanResumeBulanan = LaporanResumeBulanan::create($request->all());

        return redirect()->route('admin.laporan-resume-bulanans.index');
    }

    public function edit(LaporanResumeBulanan $laporanResumeBulanan)
    {
        abort_if(Gate::denies('laporan_resume_bulanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanResumeBulanans.edit', compact('laporanResumeBulanan'));
    }

    public function update(UpdateLaporanResumeBulananRequest $request, LaporanResumeBulanan $laporanResumeBulanan)
    {
        $laporanResumeBulanan->update($request->all());

        return redirect()->route('admin.laporan-resume-bulanans.index');
    }

    public function show(LaporanResumeBulanan $laporanResumeBulanan)
    {
        abort_if(Gate::denies('laporan_resume_bulanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanResumeBulanans.show', compact('laporanResumeBulanan'));
    }

    public function destroy(LaporanResumeBulanan $laporanResumeBulanan)
    {
        abort_if(Gate::denies('laporan_resume_bulanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanResumeBulanan->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaporanResumeBulananRequest $request)
    {
        LaporanResumeBulanan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
