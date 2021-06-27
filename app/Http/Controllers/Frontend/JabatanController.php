<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJabatanRequest;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Models\Jabatan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JabatanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jabatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jabatans = Jabatan::all();

        return view('frontend.jabatans.index', compact('jabatans'));
    }

    public function create()
    {
        abort_if(Gate::denies('jabatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.jabatans.create');
    }

    public function store(StoreJabatanRequest $request)
    {
        $jabatan = Jabatan::create($request->all());

        return redirect()->route('frontend.jabatans.index');
    }

    public function edit(Jabatan $jabatan)
    {
        abort_if(Gate::denies('jabatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.jabatans.edit', compact('jabatan'));
    }

    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        $jabatan->update($request->all());

        return redirect()->route('frontend.jabatans.index');
    }

    public function show(Jabatan $jabatan)
    {
        abort_if(Gate::denies('jabatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.jabatans.show', compact('jabatan'));
    }

    public function destroy(Jabatan $jabatan)
    {
        abort_if(Gate::denies('jabatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jabatan->delete();

        return back();
    }

    public function massDestroy(MassDestroyJabatanRequest $request)
    {
        Jabatan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
