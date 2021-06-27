<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLaporanHarianRequest;
use App\Http\Requests\UpdateLaporanHarianRequest;
use App\Http\Resources\Admin\LaporanHarianResource;
use App\Models\LaporanHarian;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanHarianApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_harian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaporanHarianResource(LaporanHarian::all());
    }

    public function store(StoreLaporanHarianRequest $request)
    {
        $laporanHarian = LaporanHarian::create($request->all());

        return (new LaporanHarianResource($laporanHarian))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LaporanHarian $laporanHarian)
    {
        abort_if(Gate::denies('laporan_harian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaporanHarianResource($laporanHarian);
    }

    public function update(UpdateLaporanHarianRequest $request, LaporanHarian $laporanHarian)
    {
        $laporanHarian->update($request->all());

        return (new LaporanHarianResource($laporanHarian))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LaporanHarian $laporanHarian)
    {
        abort_if(Gate::denies('laporan_harian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanHarian->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
