<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePresensiHadirRequest;
use App\Http\Requests\UpdatePresensiHadirRequest;
use App\Http\Resources\Admin\PresensiHadirResource;
use App\Models\PresensiHadir;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresensiHadirApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('presensi_hadir_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresensiHadirResource(PresensiHadir::with(['userid'])->get());
    }

    public function store(StorePresensiHadirRequest $request)
    {
        $presensiHadir = PresensiHadir::create($request->all());

        if ($request->input('image', false)) {
            $presensiHadir->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new PresensiHadirResource($presensiHadir))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PresensiHadir $presensiHadir)
    {
        abort_if(Gate::denies('presensi_hadir_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresensiHadirResource($presensiHadir->load(['userid']));
    }

    public function update(UpdatePresensiHadirRequest $request, PresensiHadir $presensiHadir)
    {
        $presensiHadir->update($request->all());

        if ($request->input('image', false)) {
            if (!$presensiHadir->image || $request->input('image') !== $presensiHadir->image->file_name) {
                if ($presensiHadir->image) {
                    $presensiHadir->image->delete();
                }
                $presensiHadir->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($presensiHadir->image) {
            $presensiHadir->image->delete();
        }

        return (new PresensiHadirResource($presensiHadir))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PresensiHadir $presensiHadir)
    {
        abort_if(Gate::denies('presensi_hadir_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presensiHadir->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
