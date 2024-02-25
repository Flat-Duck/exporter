<?php

namespace App\Http\Controllers\Api;

use App\Models\Exporter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupportResource;
use App\Http\Resources\SupportCollection;

class ExporterSupportsController extends Controller
{
    public function index(
        Request $request,
        Exporter $exporter
    ): SupportCollection {
        $this->authorize('view', $exporter);

        $search = $request->get('search', '');

        $supports = $exporter
            ->supports()
            ->search($search)
            ->latest()
            ->paginate();

        return new SupportCollection($supports);
    }

    public function store(Request $request, Exporter $exporter): SupportResource
    {
        $this->authorize('create', Support::class);

        $validated = $request->validate([
            'description' => ['required', 'max:255', 'string'],
            'support_type_id' => ['required', 'exists:support_types,id'],
        ]);

        $support = $exporter->supports()->create($validated);

        return new SupportResource($support);
    }
}
