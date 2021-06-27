<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePresensiTidakHadirRequest;
use App\Http\Requests\UpdatePresensiTidakHadirRequest;
use App\Http\Resources\Admin\PresensiTidakHadirResource;
use App\Models\PresensiTidakHadir;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresensiTidakHadirApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presensi_tidak_hadir_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresensiTidakHadirResource(PresensiTidakHadir::with(['id_pegawai', 'keterangan'])->get());
    }

    public function store(StorePresensiTidakHadirRequest $request)
    {
        $presensiTidakHadir = PresensiTidakHadir::create($request->all());

        return (new PresensiTidakHadirResource($presensiTidakHadir))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PresensiTidakHadir $presensiTidakHadir)
    {
        abort_if(Gate::denies('presensi_tidak_hadir_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresensiTidakHadirResource($presensiTidakHadir->load(['id_pegawai', 'keterangan']));
    }

    public function update(UpdatePresensiTidakHadirRequest $request, PresensiTidakHadir $presensiTidakHadir)
    {
        $presensiTidakHadir->update($request->all());

        return (new PresensiTidakHadirResource($presensiTidakHadir))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PresensiTidakHadir $presensiTidakHadir)
    {
        abort_if(Gate::denies('presensi_tidak_hadir_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presensiTidakHadir->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
