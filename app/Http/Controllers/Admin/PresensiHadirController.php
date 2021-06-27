<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPresensiHadirRequest;
use App\Http\Requests\StorePresensiHadirRequest;
use App\Http\Requests\UpdatePresensiHadirRequest;
use App\Models\PresensiHadir;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PresensiHadirController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('presensi_hadir_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presensiHadirs = PresensiHadir::with(['userid', 'media'])->get();

        return view('admin.presensiHadirs.index', compact('presensiHadirs'));
    }

    public function create()
    {
        abort_if(Gate::denies('presensi_hadir_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userids = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.presensiHadirs.create', compact('userids'));
    }

    public function store(StorePresensiHadirRequest $request)
    {
        $presensiHadir = PresensiHadir::create($request->all());

        if ($request->input('image', false)) {
            $presensiHadir->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $presensiHadir->id]);
        }

        return redirect()->route('admin.presensi-hadirs.index');
    }

    public function edit(PresensiHadir $presensiHadir)
    {
        abort_if(Gate::denies('presensi_hadir_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userids = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $presensiHadir->load('userid');

        return view('admin.presensiHadirs.edit', compact('userids', 'presensiHadir'));
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

        return redirect()->route('admin.presensi-hadirs.index');
    }

    public function show(PresensiHadir $presensiHadir)
    {
        abort_if(Gate::denies('presensi_hadir_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presensiHadir->load('userid');

        return view('admin.presensiHadirs.show', compact('presensiHadir'));
    }

    public function destroy(PresensiHadir $presensiHadir)
    {
        abort_if(Gate::denies('presensi_hadir_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presensiHadir->delete();

        return back();
    }

    public function massDestroy(MassDestroyPresensiHadirRequest $request)
    {
        PresensiHadir::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('presensi_hadir_create') && Gate::denies('presensi_hadir_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PresensiHadir();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
