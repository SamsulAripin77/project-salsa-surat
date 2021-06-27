<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLaporanPeriodikRequest;
use App\Http\Requests\UpdateLaporanPeriodikRequest;
use App\Http\Resources\Admin\LaporanPeriodikResource;
use App\Models\LaporanPeriodik;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanPeriodikApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_periodik_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaporanPeriodikResource(LaporanPeriodik::all());
    }

    public function store(StoreLaporanPeriodikRequest $request)
    {
        $laporanPeriodik = LaporanPeriodik::create($request->all());

        return (new LaporanPeriodikResource($laporanPeriodik))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LaporanPeriodik $laporanPeriodik)
    {
        abort_if(Gate::denies('laporan_periodik_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaporanPeriodikResource($laporanPeriodik);
    }

    public function update(UpdateLaporanPeriodikRequest $request, LaporanPeriodik $laporanPeriodik)
    {
        $laporanPeriodik->update($request->all());

        return (new LaporanPeriodikResource($laporanPeriodik))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LaporanPeriodik $laporanPeriodik)
    {
        abort_if(Gate::denies('laporan_periodik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanPeriodik->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
