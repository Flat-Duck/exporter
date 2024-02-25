<?php

namespace App\Http\Controllers\Api;

use App\Models\Exporter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExporterResource;
use App\Http\Resources\ExporterCollection;
use App\Http\Requests\ExporterStoreRequest;
use App\Http\Requests\ExporterUpdateRequest;

class ExporterController extends Controller
{
    public function index(Request $request): ExporterCollection
    {
        $this->authorize('view-any', Exporter::class);

        $search = $request->get('search', '');

        $exporters = Exporter::search($search)
            ->latest()
            ->paginate();

        return new ExporterCollection($exporters);
    }

    public function store(ExporterStoreRequest $request): ExporterResource
    {
        $this->authorize('create', Exporter::class);

        $validated = $request->validated();

        $exporter = Exporter::create($validated);

        return new ExporterResource($exporter);
    }

    public function show(Request $request, Exporter $exporter): ExporterResource
    {
        $this->authorize('view', $exporter);

        return new ExporterResource($exporter);
    }

    public function update(
        ExporterUpdateRequest $request,
        Exporter $exporter
    ): ExporterResource {
        $this->authorize('update', $exporter);

        $validated = $request->validated();

        $exporter->update($validated);

        return new ExporterResource($exporter);
    }

    public function destroy(Request $request, Exporter $exporter): Response
    {
        $this->authorize('delete', $exporter);

        $exporter->delete();

        return response()->noContent();
    }
}
