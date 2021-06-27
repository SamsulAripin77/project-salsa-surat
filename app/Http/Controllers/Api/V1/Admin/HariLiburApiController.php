<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHariLiburRequest;
use App\Http\Requests\UpdateHariLiburRequest;
use App\Http\Resources\Admin\HariLiburResource;
use App\Models\HariLibur;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HariLiburApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hari_libur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HariLiburResource(HariLibur::all());
    }

    public function store(StoreHariLiburRequest $request)
    {
        $hariLibur = HariLibur::create($request->all());

        return (new HariLiburResource($hariLibur))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HariLibur $hariLibur)
    {
        abort_if(Gate::denies('hari_libur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HariLiburResource($hariLibur);
    }

    public function update(UpdateHariLiburRequest $request, HariLibur $hariLibur)
    {
        $hariLibur->update($request->all());

        return (new HariLiburResource($hariLibur))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HariLibur $hariLibur)
    {
        abort_if(Gate::denies('hari_libur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hariLibur->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
