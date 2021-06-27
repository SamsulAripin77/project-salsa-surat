<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitKerjaRequest;
use App\Http\Requests\UpdateUnitKerjaRequest;
use App\Http\Resources\Admin\UnitKerjaResource;
use App\Models\UnitKerja;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnitKerjaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('unit_kerja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnitKerjaResource(UnitKerja::all());
    }

    public function store(StoreUnitKerjaRequest $request)
    {
        $unitKerja = UnitKerja::create($request->all());

        return (new UnitKerjaResource($unitKerja))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UnitKerja $unitKerja)
    {
        abort_if(Gate::denies('unit_kerja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnitKerjaResource($unitKerja);
    }

    public function update(UpdateUnitKerjaRequest $request, UnitKerja $unitKerja)
    {
        $unitKerja->update($request->all());

        return (new UnitKerjaResource($unitKerja))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UnitKerja $unitKerja)
    {
        abort_if(Gate::denies('unit_kerja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitKerja->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
