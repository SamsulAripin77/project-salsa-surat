<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUnitKerjaRequest;
use App\Http\Requests\StoreUnitKerjaRequest;
use App\Http\Requests\UpdateUnitKerjaRequest;
use App\Models\UnitKerja;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnitKerjaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('unit_kerja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitKerjas = UnitKerja::all();

        return view('frontend.unitKerjas.index', compact('unitKerjas'));
    }

    public function create()
    {
        abort_if(Gate::denies('unit_kerja_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.unitKerjas.create');
    }

    public function store(StoreUnitKerjaRequest $request)
    {
        $unitKerja = UnitKerja::create($request->all());

        return redirect()->route('frontend.unit-kerjas.index');
    }

    public function edit(UnitKerja $unitKerja)
    {
        abort_if(Gate::denies('unit_kerja_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.unitKerjas.edit', compact('unitKerja'));
    }

    public function update(UpdateUnitKerjaRequest $request, UnitKerja $unitKerja)
    {
        $unitKerja->update($request->all());

        return redirect()->route('frontend.unit-kerjas.index');
    }

    public function show(UnitKerja $unitKerja)
    {
        abort_if(Gate::denies('unit_kerja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.unitKerjas.show', compact('unitKerja'));
    }

    public function destroy(UnitKerja $unitKerja)
    {
        abort_if(Gate::denies('unit_kerja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitKerja->delete();

        return back();
    }

    public function massDestroy(MassDestroyUnitKerjaRequest $request)
    {
        UnitKerja::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
