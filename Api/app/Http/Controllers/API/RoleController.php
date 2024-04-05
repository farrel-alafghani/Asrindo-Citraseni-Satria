<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::latest()->get();
        return response()->json([RoleResource::collection($data), 'Program Fecthed']);
    }


    public function store(Request $request)
    {
        $role = Role::create([
            'unitName' => $request->unitName,
            'serialNumber' => $request->serialNumber,
            'unitLocation' => $request->unitLocation,
            'lastMaintenance' => $request->lastMaintenance
        ]);
        if ($role) {
            return response()->json(['User Berhasil ditambah', new RoleResource($role)]);
        } else {
            return response()->json(['Gagal', new RoleResource($role)]);
        }
    }


    public function show($id)
    {
        $role = Role::find($id);
        if (is_null($role)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new RoleResource($role)]);
    }


    public function update(Request $request,  $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return response()->json(['Update Success', $role]);
    }


    public function destroy($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $role->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
