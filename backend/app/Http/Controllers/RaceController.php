<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRaceRequest;
use App\Http\Requests\UpdateRaceRequest;
use App\Http\Resources\RaceResource;
use App\Models\Race;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Gate;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        return RaceResource::collection(Race::with("teams")->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRaceRequest $request): JsonResource
    {
        $data = $request->validated();
        $race = Race::create($data);
        return new RaceResource($race->load('teams'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Race $race): JsonResource
    {
        return new RaceResource($race->load("teams"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRaceRequest $request, Race $race): JsonResource
    {
        $data = $request->validated();
        $race->update($data);
        return new RaceResource($race->load('teams'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race)
    {
        Gate::authorize("delete-race", $race);
        return $race->delete() ? response()->noContent() : abort(500);
    }
}
