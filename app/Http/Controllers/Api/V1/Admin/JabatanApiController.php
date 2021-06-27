<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Http\Resources\Admin\JabatanResource;
use App\Models\Jabatan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JabatanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jabatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JabatanResource(Jabatan::all());
    }

    public function store(StoreJabatanRequest $request)
    {
        $jabatan = Jabatan::create($request->all());

        return (new JabatanResource($jabatan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Jabatan $jabatan)
    {
        abort_if(Gate::denies('jabatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JabatanResource($jabatan);
    }

    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        $jabatan->update($request->all());

        return (new JabatanResource($jabatan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Jabatan $jabatan)
    {
        abort_if(Gate::denies('jabatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jabatan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
