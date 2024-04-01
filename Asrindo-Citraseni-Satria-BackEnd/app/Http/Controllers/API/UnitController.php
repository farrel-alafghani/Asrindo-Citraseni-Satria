<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $data = Unit::latest()->get();
        return response()->json([UnitResource::collection($data), 'Program Fecthed']);
    }


    public function store(Request $request)
    {
        $unit = Unit::create([
            'unitName' => $request->unitName,
            'serialNumber' => $request->serialNumber,
            'unitLocation' => $request->unitLocation,
            'lastMaintenance' => $request->lastMaintenance
        ]);
        if ($unit) {
            return response()->json(['User Berhasil ditambah', new UnitResource($unit)]);
        } else {
            return response()->json(['Gagal', new UnitResource($unit)]);
        }
    }


    public function show($id)
    {
        $unit = Unit::find($id);
        if (is_null($unit)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new UnitResource($unit)]);
    }


    public function update(Request $request,  $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->update($request->all());
        return response()->json(['Update Success', $unit]);
    }


    public function destroy($id)
    {
        $unit = Unit::find($id);
        if (!$unit) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $unit->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
