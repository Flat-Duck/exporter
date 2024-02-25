<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\Exporter;
use Illuminate\View\View;
use App\Models\SupportType;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SupportStoreRequest;
use App\Http\Requests\SupportUpdateRequest;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Support::class);

        $search = $request->get('search', '');

        $supports = Support::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.supports.index', compact('supports', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Support::class);

        $supportTypes = SupportType::pluck('name', 'id');
        $exporters = Exporter::pluck('first_name', 'id');

        return view(
            'app.supports.create',
            compact('supportTypes', 'exporters')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupportStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Support::class);

        $validated = $request->validated();

        $support = Support::create($validated);

        return redirect()
            ->route('supports.edit', $support)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Support $support): View
    {
        $this->authorize('view', $support);

        return view('app.supports.show', compact('support'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Support $support): View
    {
        $this->authorize('update', $support);

        $supportTypes = SupportType::pluck('name', 'id');
        $exporters = Exporter::pluck('first_name', 'id');

        return view(
            'app.supports.edit',
            compact('support', 'supportTypes', 'exporters')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SupportUpdateRequest $request,
        Support $support
    ): RedirectResponse {
        $this->authorize('update', $support);

        $validated = $request->validated();

        $support->update($validated);

        return redirect()
            ->route('supports.edit', $support)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Support $support
    ): RedirectResponse {
        $this->authorize('delete', $support);

        $support->delete();

        return redirect()
            ->route('supports.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
