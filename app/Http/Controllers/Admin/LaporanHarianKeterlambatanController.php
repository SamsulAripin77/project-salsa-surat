<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanHarianKeterlambatanRequest;
use App\Http\Requests\StoreLaporanHarianKeterlambatanRequest;
use App\Http\Requests\UpdateLaporanHarianKeterlambatanRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanHarianKeterlambatanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_harian_keterlambatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanHarianKeterlambatans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('laporan_harian_keterlambatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanHarianKeterlambatans.create');
    }

    public function store(StoreLaporanHarianKeterlambatanRequest $request)
    {
        $laporanHarianKeterlambatan = LaporanHarianKeterlambatan::create($request->all());

        return redirect()->route('admin.laporan-harian-keterlambatans.index');
    }

    public function edit(LaporanHarianKeterlambatan $laporanHarianKeterlambatan)
    {
        abort_if(Gate::denies('laporan_harian_keterlambatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanHarianKeterlambatans.edit', compact('laporanHarianKeterlambatan'));
    }

    public function update(UpdateLaporanHarianKeterlambatanRequest $request, LaporanHarianKeterlambatan $laporanHarianKeterlambatan)
    {
        $laporanHarianKeterlambatan->update($request->all());

        return redirect()->route('admin.laporan-harian-keterlambatans.index');
    }

    public function show(LaporanHarianKeterlambatan $laporanHarianKeterlambatan)
    {
        abort_if(Gate::denies('laporan_harian_keterlambatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanHarianKeterlambatans.show', compact('laporanHarianKeterlambatan'));
    }

    public function destroy(LaporanHarianKeterlambatan $laporanHarianKeterlambatan)
    {
        abort_if(Gate::denies('laporan_harian_keterlambatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanHarianKeterlambatan->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaporanHarianKeterlambatanRequest $request)
    {
        LaporanHarianKeterlambatan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
