<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPresensiTidakHadirRequest;
use App\Http\Requests\StorePresensiTidakHadirRequest;
use App\Http\Requests\UpdatePresensiTidakHadirRequest;
use App\Models\Keterangan;
use App\Models\PresensiTidakHadir;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresensiTidakHadirController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presensi_tidak_hadir_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presensiTidakHadirs = PresensiTidakHadir::with(['id_pegawai', 'keterangan'])->get();

        return view('frontend.presensiTidakHadirs.index', compact('presensiTidakHadirs'));
    }

    public function create()
    {
        abort_if(Gate::denies('presensi_tidak_hadir_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_pegawais = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $keterangans = Keterangan::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.presensiTidakHadirs.create', compact('id_pegawais', 'keterangans'));
    }

    public function store(StorePresensiTidakHadirRequest $request)
    {
        $presensiTidakHadir = PresensiTidakHadir::create($request->all());

        return redirect()->route('frontend.presensi-tidak-hadirs.index');
    }

    public function edit(PresensiTidakHadir $presensiTidakHadir)
    {
        abort_if(Gate::denies('presensi_tidak_hadir_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_pegawais = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $keterangans = Keterangan::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $presensiTidakHadir->load('id_pegawai', 'keterangan');

        return view('frontend.presensiTidakHadirs.edit', compact('id_pegawais', 'keterangans', 'presensiTidakHadir'));
    }

    public function update(UpdatePresensiTidakHadirRequest $request, PresensiTidakHadir $presensiTidakHadir)
    {
        $presensiTidakHadir->update($request->all());

        return redirect()->route('frontend.presensi-tidak-hadirs.index');
    }

    public function show(PresensiTidakHadir $presensiTidakHadir)
    {
        abort_if(Gate::denies('presensi_tidak_hadir_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presensiTidakHadir->load('id_pegawai', 'keterangan');

        return view('frontend.presensiTidakHadirs.show', compact('presensiTidakHadir'));
    }

    public function destroy(PresensiTidakHadir $presensiTidakHadir)
    {
        abort_if(Gate::denies('presensi_tidak_hadir_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presensiTidakHadir->delete();

        return back();
    }

    public function massDestroy(MassDestroyPresensiTidakHadirRequest $request)
    {
        PresensiTidakHadir::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
