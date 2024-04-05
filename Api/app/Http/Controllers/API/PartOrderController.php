<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartOrderResource;
use App\Models\PartOrder;
use Illuminate\Http\Request;

class PartOrderController extends Controller
{
    public function index()
    {
        $data = PartOrder::latest()->get();
        return response()->json([PartOrderResource::collection($data), 'Program Fecthed']);
    }


    public function store(Request $request)
    {
        $partOrder = PartOrder::create([
            'maintenanceId' => $request->maintenanceId,
            'partId' => $request->partId

        ]);
        if ($partOrder) {
            return response()->json(['User Berhasil ditambah', new PartOrderResource($partOrder)]);
        } else {
            return response()->json(['Gagal', new PartOrderResource($partOrder)]);
        }
    }


    public function show($id)
    {
        $partOrder = PartOrder::find($id);
        if (is_null($partOrder)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new PartOrderResource($partOrder)]);
    }


    public function update(Request $request,  $id)
    {
        $partOrder = PartOrder::findOrFail($id);
        $partOrder->update($request->all());
        return response()->json(['Update Success', $partOrder]);
    }


    public function destroy($id)
    {
        $partOrder = PartOrder::find($id);
        if (!$partOrder) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $partOrder->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
