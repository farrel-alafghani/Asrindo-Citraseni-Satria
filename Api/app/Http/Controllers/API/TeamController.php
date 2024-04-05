<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $data = Team::latest()->get();
        return response()->json([TeamResource::collection($data), 'Program Fecthed']);
    }


    public function store(Request $request)
    {
        $team = Team::create([
            'teamName' => $request->teamName,
            'userId' => $request->userId

        ]);
        if ($team) {
            return response()->json(['User Berhasil ditambah', new TeamResource($team)]);
        } else {
            return response()->json(['Gagal', new TeamResource($team)]);
        }
    }


    public function show($id)
    {
        $team = Team::find($id);
        if (is_null($team)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new TeamResource($team)]);
    }


    public function update(Request $request,  $id)
    {
        $team = Team::findOrFail($id);
        $team->update($request->all());
        return response()->json(['Update Success', $team]);
    }


    public function destroy($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $team->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
