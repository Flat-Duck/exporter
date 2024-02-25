<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\SupportType;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SupportTypeStoreRequest;
use App\Http\Requests\SupportTypeUpdateRequest;

class SupportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', SupportType::class);

        $search = $request->get('search', '');

        $supportTypes = SupportType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.support_types.index',
            compact('supportTypes', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', SupportType::class);

        return view('app.support_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupportTypeStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', SupportType::class);

        $validated = $request->validated();

        $supportType = SupportType::create($validated);

        return redirect()
            ->route('support-types.edit', $supportType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, SupportType $supportType): View
    {
        $this->authorize('view', $supportType);

        return view('app.support_types.show', compact('supportType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, SupportType $supportType): View
    {
        $this->authorize('update', $supportType);

        return view('app.support_types.edit', compact('supportType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SupportTypeUpdateRequest $request,
        SupportType $supportType
    ): RedirectResponse {
        $this->authorize('update', $supportType);

        $validated = $request->validated();

        $supportType->update($validated);

        return redirect()
            ->route('support-types.edit', $supportType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        SupportType $supportType
    ): RedirectResponse {
        $this->authorize('delete', $supportType);

        $supportType->delete();

        return redirect()
            ->route('support-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
