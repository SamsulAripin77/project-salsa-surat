<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKeteranganRequest;
use App\Http\Requests\UpdateKeteranganRequest;
use App\Http\Resources\Admin\KeteranganResource;
use App\Models\Keterangan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KeteranganApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('keterangan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KeteranganResource(Keterangan::all());
    }

    public function store(StoreKeteranganRequest $request)
    {
        $keterangan = Keterangan::create($request->all());

        return (new KeteranganResource($keterangan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Keterangan $keterangan)
    {
        abort_if(Gate::denies('keterangan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KeteranganResource($keterangan);
    }

    public function update(UpdateKeteranganRequest $request, Keterangan $keterangan)
    {
        $keterangan->update($request->all());

        return (new KeteranganResource($keterangan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Keterangan $keterangan)
    {
        abort_if(Gate::denies('keterangan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keterangan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
