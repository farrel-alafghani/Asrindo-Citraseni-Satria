<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartResource;
use Illuminate\Http\Request;
use App\Models\Part;

class PartController extends Controller
{
    public function index()
    {
        $data = Part::latest()->get();
        return response()->json([PartResource::collection($data), 'Program Fecthed']);
    }


    public function store(Request $request)
    {
        $part = Part::create([
            'partName' => $request->partName,
            'userId' => $request->userId

        ]);
        if ($part) {
            return response()->json(['User Berhasil ditambah', new PartResource($part)]);
        } else {
            return response()->json(['Gagal', new PartResource($part)]);
        }
    }


    public function show($id)
    {
        $part = Part::find($id);
        if (is_null($part)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new PartResource($part)]);
    }


    public function update(Request $request,  $id)
    {
        $part = Part::findOrFail($id);
        $part->update($request->all());
        return response()->json(['Update Success', $part]);
    }


    public function destroy($id)
    {
        $part = Part::find($id);
        if (!$part) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $part->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
