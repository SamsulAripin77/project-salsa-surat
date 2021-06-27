<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLaporanResumeBulananRequest;
use App\Http\Requests\UpdateLaporanResumeBulananRequest;
use App\Http\Resources\Admin\LaporanResumeBulananResource;
use App\Models\LaporanResumeBulanan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanResumeBulananApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_resume_bulanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaporanResumeBulananResource(LaporanResumeBulanan::all());
    }

    public function store(StoreLaporanResumeBulananRequest $request)
    {
        $laporanResumeBulanan = LaporanResumeBulanan::create($request->all());

        return (new LaporanResumeBulananResource($laporanResumeBulanan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LaporanResumeBulanan $laporanResumeBulanan)
    {
        abort_if(Gate::denies('laporan_resume_bulanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaporanResumeBulananResource($laporanResumeBulanan);
    }

    public function update(UpdateLaporanResumeBulananRequest $request, LaporanResumeBulanan $laporanResumeBulanan)
    {
        $laporanResumeBulanan->update($request->all());

        return (new LaporanResumeBulananResource($laporanResumeBulanan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LaporanResumeBulanan $laporanResumeBulanan)
    {
        abort_if(Gate::denies('laporan_resume_bulanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanResumeBulanan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
