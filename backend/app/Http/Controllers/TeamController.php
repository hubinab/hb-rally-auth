<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        return TeamResource::collection(Team::with('race')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request): JsonResource
    {
        $data = $request->validated();
        $team = Team::create($data);
        return new TeamResource($team->load('race'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team): JsonResource
    {
        return new TeamResource($team->load('race'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team): JsonResource
    {
        $data = $request->validated();
        $team->update($data);
        return new TeamResource($team->load('race'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        return $team->delete() ? response()->noContent() : abort(500);
    }
}
