<?php

namespace App\Http\Controllers\Api;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\AdResource;
use App\Http\Resources\AdCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdStoreRequest;
use App\Http\Requests\AdUpdateRequest;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index(Request $request): AdCollection
    {
        $this->authorize('view-any', Ad::class);

        $search = $request->get('search', '');

        $ads = Ad::search($search)
            ->latest()
            ->paginate();

        return new AdCollection($ads);
    }

    public function store(AdStoreRequest $request): AdResource
    {
        $this->authorize('create', Ad::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $ad = Ad::create($validated);

        return new AdResource($ad);
    }

    public function show(Request $request, Ad $ad): AdResource
    {
        $this->authorize('view', $ad);

        return new AdResource($ad);
    }

    public function update(AdUpdateRequest $request, Ad $ad): AdResource
    {
        $this->authorize('update', $ad);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($ad->image) {
                Storage::delete($ad->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $ad->update($validated);

        return new AdResource($ad);
    }

    public function destroy(Request $request, Ad $ad): Response
    {
        $this->authorize('delete', $ad);

        if ($ad->image) {
            Storage::delete($ad->image);
        }

        $ad->delete();

        return response()->noContent();
    }
}
