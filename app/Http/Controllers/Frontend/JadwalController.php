<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJadwalRequest;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Jadwal;
use App\Models\Shift;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JadwalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jadwal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwals = Jadwal::with(['id_shift'])->get();

        return view('frontend.jadwals.index', compact('jadwals'));
    }

    public function create()
    {
        abort_if(Gate::denies('jadwal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_shifts = Shift::all()->pluck('nama_shift', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.jadwals.create', compact('id_shifts'));
    }

    public function store(StoreJadwalRequest $request)
    {
        $jadwal = Jadwal::create($request->all());

        return redirect()->route('frontend.jadwals.index');
    }

    public function edit(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_shifts = Shift::all()->pluck('nama_shift', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jadwal->load('id_shift');

        return view('frontend.jadwals.edit', compact('id_shifts', 'jadwal'));
    }

    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $jadwal->update($request->all());

        return redirect()->route('frontend.jadwals.index');
    }

    public function show(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwal->load('id_shift');

        return view('frontend.jadwals.show', compact('jadwal'));
    }

    public function destroy(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwal->delete();

        return back();
    }

    public function massDestroy(MassDestroyJadwalRequest $request)
    {
        Jadwal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
