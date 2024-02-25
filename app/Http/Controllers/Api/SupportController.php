<?php

namespace App\Http\Controllers\Api;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupportResource;
use App\Http\Resources\SupportCollection;
use App\Http\Requests\SupportStoreRequest;
use App\Http\Requests\SupportUpdateRequest;

class SupportController extends Controller
{
    public function index(Request $request): SupportCollection
    {
        $this->authorize('view-any', Support::class);

        $search = $request->get('search', '');

        $supports = Support::search($search)
            ->latest()
            ->paginate();

        return new SupportCollection($supports);
    }

    public function store(SupportStoreRequest $request): SupportResource
    {
        $this->authorize('create', Support::class);

        $validated = $request->validated();

        $support = Support::create($validated);

        return new SupportResource($support);
    }

    public function show(Request $request, Support $support): SupportResource
    {
        $this->authorize('view', $support);

        return new SupportResource($support);
    }

    public function update(
        SupportUpdateRequest $request,
        Support $support
    ): SupportResource {
        $this->authorize('update', $support);

        $validated = $request->validated();

        $support->update($validated);

        return new SupportResource($support);
    }

    public function destroy(Request $request, Support $support): Response
    {
        $this->authorize('delete', $support);

        $support->delete();

        return response()->noContent();
    }
}
