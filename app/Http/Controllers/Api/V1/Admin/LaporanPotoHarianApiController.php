<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLaporanPotoHarianRequest;
use App\Http\Requests\UpdateLaporanPotoHarianRequest;
use App\Http\Resources\Admin\LaporanPotoHarianResource;
use App\Models\LaporanPotoHarian;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanPotoHarianApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_poto_harian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaporanPotoHarianResource(LaporanPotoHarian::all());
    }

    public function store(StoreLaporanPotoHarianRequest $request)
    {
        $laporanPotoHarian = LaporanPotoHarian::create($request->all());

        return (new LaporanPotoHarianResource($laporanPotoHarian))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LaporanPotoHarian $laporanPotoHarian)
    {
        abort_if(Gate::denies('laporan_poto_harian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaporanPotoHarianResource($laporanPotoHarian);
    }

    public function update(UpdateLaporanPotoHarianRequest $request, LaporanPotoHarian $laporanPotoHarian)
    {
        $laporanPotoHarian->update($request->all());

        return (new LaporanPotoHarianResource($laporanPotoHarian))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LaporanPotoHarian $laporanPotoHarian)
    {
        abort_if(Gate::denies('laporan_poto_harian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanPotoHarian->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
