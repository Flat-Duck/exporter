<?php

namespace App\Http\Controllers\Api;

use App\Models\SupportType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupportTypeResource;
use App\Http\Resources\SupportTypeCollection;
use App\Http\Requests\SupportTypeStoreRequest;
use App\Http\Requests\SupportTypeUpdateRequest;

class SupportTypeController extends Controller
{
    public function index(Request $request): SupportTypeCollection
    {
        $this->authorize('view-any', SupportType::class);

        $search = $request->get('search', '');

        $supportTypes = SupportType::search($search)
            ->latest()
            ->paginate();

        return new SupportTypeCollection($supportTypes);
    }

    public function store(SupportTypeStoreRequest $request): SupportTypeResource
    {
        $this->authorize('create', SupportType::class);

        $validated = $request->validated();

        $supportType = SupportType::create($validated);

        return new SupportTypeResource($supportType);
    }

    public function show(
        Request $request,
        SupportType $supportType
    ): SupportTypeResource {
        $this->authorize('view', $supportType);

        return new SupportTypeResource($supportType);
    }

    public function update(
        SupportTypeUpdateRequest $request,
        SupportType $supportType
    ): SupportTypeResource {
        $this->authorize('update', $supportType);

        $validated = $request->validated();

        $supportType->update($validated);

        return new SupportTypeResource($supportType);
    }

    public function destroy(
        Request $request,
        SupportType $supportType
    ): Response {
        $this->authorize('delete', $supportType);

        $supportType->delete();

        return response()->noContent();
    }
}
