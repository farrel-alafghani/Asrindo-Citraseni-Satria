<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaintenanceResource;
use Illuminate\Http\Request;
use App\Models\Maintenance;


class MaintenanceController extends Controller
{
    public function index()
    {
        $data = Maintenance::latest()->get();
        return response()->json([MaintenanceResource::collection($data), 'Program Fecthed']);
    }


    public function store(Request $request)
    {
        $maintenance = Maintenance::create([
            'itemName' => $request->itemName,
            'serialNumber' => $request->serialNumber,
        ]);
        if ($maintenance) {
            return response()->json(['User Berhasil ditambah', new MaintenanceResource($maintenance)]);
        } else {
            return response()->json(['Gagal', new MaintenanceResource($maintenance)]);
        }
    }


    public function show($id)
    {
        $maintenance = Maintenance::find($id);
        if (is_null($maintenance)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new MaintenanceResource($maintenance)]);
    }


    public function update(Request $request,  $id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update($request->all());
        return response()->json(['Update Success', $maintenance]);
    }


    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);
        if (!$maintenance) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $maintenance->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
