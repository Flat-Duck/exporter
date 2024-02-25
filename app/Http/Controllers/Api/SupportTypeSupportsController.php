<?php

namespace App\Http\Controllers\Api;

use App\Models\SupportType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupportResource;
use App\Http\Resources\SupportCollection;

class SupportTypeSupportsController extends Controller
{
    public function index(
        Request $request,
        SupportType $supportType
    ): SupportCollection {
        $this->authorize('view', $supportType);

        $search = $request->get('search', '');

        $supports = $supportType
            ->supports()
            ->search($search)
            ->latest()
            ->paginate();

        return new SupportCollection($supports);
    }

    public function store(
        Request $request,
        SupportType $supportType
    ): SupportResource {
        $this->authorize('create', Support::class);

        $validated = $request->validate([
            'description' => ['required', 'max:255', 'string'],
            'exporter_id' => ['required', 'exists:exporters,id'],
        ]);

        $support = $supportType->supports()->create($validated);

        return new SupportResource($support);
    }
}
