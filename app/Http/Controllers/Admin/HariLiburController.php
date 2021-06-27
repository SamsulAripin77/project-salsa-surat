<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHariLiburRequest;
use App\Http\Requests\StoreHariLiburRequest;
use App\Http\Requests\UpdateHariLiburRequest;
use App\Models\HariLibur;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HariLiburController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hari_libur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hariLiburs = HariLibur::all();

        return view('admin.hariLiburs.index', compact('hariLiburs'));
    }

    public function create()
    {
        abort_if(Gate::denies('hari_libur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hariLiburs.create');
    }

    public function store(StoreHariLiburRequest $request)
    {
        $hariLibur = HariLibur::create($request->all());

        return redirect()->route('admin.hari-liburs.index');
    }

    public function edit(HariLibur $hariLibur)
    {
        abort_if(Gate::denies('hari_libur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hariLiburs.edit', compact('hariLibur'));
    }

    public function update(UpdateHariLiburRequest $request, HariLibur $hariLibur)
    {
        $hariLibur->update($request->all());

        return redirect()->route('admin.hari-liburs.index');
    }

    public function show(HariLibur $hariLibur)
    {
        abort_if(Gate::denies('hari_libur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hariLiburs.show', compact('hariLibur'));
    }

    public function destroy(HariLibur $hariLibur)
    {
        abort_if(Gate::denies('hari_libur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hariLibur->delete();

        return back();
    }

    public function massDestroy(MassDestroyHariLiburRequest $request)
    {
        HariLibur::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
