<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Exporter;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ExporterStoreRequest;
use App\Http\Requests\ExporterUpdateRequest;

class ExporterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Exporter::class);

        $search = $request->get('search', '');

        $exporters = Exporter::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.exporters.index', compact('exporters', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Exporter::class);

        $users = User::pluck('name', 'id');

        return view('app.exporters.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExporterStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Exporter::class);

        $validated = $request->validated();

        $exporter = Exporter::create($validated);

        return redirect()
            ->route('exporters.edit', $exporter)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Exporter $exporter): View
    {
        $this->authorize('view', $exporter);

        return view('app.exporters.show', compact('exporter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Exporter $exporter): View
    {
        $this->authorize('update', $exporter);

        $users = User::pluck('name', 'id');

        return view('app.exporters.edit', compact('exporter', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ExporterUpdateRequest $request,
        Exporter $exporter
    ): RedirectResponse {
        $this->authorize('update', $exporter);

        $validated = $request->validated();

        $exporter->update($validated);

        return redirect()
            ->route('exporters.edit', $exporter)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Exporter $exporter
    ): RedirectResponse {
        $this->authorize('delete', $exporter);

        $exporter->delete();

        return redirect()
            ->route('exporters.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
