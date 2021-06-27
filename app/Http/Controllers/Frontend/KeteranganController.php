<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKeteranganRequest;
use App\Http\Requests\StoreKeteranganRequest;
use App\Http\Requests\UpdateKeteranganRequest;
use App\Models\Keterangan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KeteranganController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('keterangan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keterangans = Keterangan::all();

        return view('frontend.keterangans.index', compact('keterangans'));
    }

    public function create()
    {
        abort_if(Gate::denies('keterangan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.keterangans.create');
    }

    public function store(StoreKeteranganRequest $request)
    {
        $keterangan = Keterangan::create($request->all());

        return redirect()->route('frontend.keterangans.index');
    }

    public function edit(Keterangan $keterangan)
    {
        abort_if(Gate::denies('keterangan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.keterangans.edit', compact('keterangan'));
    }

    public function update(UpdateKeteranganRequest $request, Keterangan $keterangan)
    {
        $keterangan->update($request->all());

        return redirect()->route('frontend.keterangans.index');
    }

    public function show(Keterangan $keterangan)
    {
        abort_if(Gate::denies('keterangan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.keterangans.show', compact('keterangan'));
    }

    public function destroy(Keterangan $keterangan)
    {
        abort_if(Gate::denies('keterangan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keterangan->delete();

        return back();
    }

    public function massDestroy(MassDestroyKeteranganRequest $request)
    {
        Keterangan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
