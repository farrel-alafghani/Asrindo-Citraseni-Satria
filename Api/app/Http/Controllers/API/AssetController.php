<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssetResource;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Asset::latest()->get();
        return response()->json([AssetResource::collection($data), 'Program Fecthed']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asset = Asset::create([
            'assetName' => $request->assetName,
            'serialNumber' => $request->serialNumber,
            'isActive' => $request->isActive,
            'lastMaintenance' => $request->lastMaintenance
        ]);
        if ($asset) {
            return response()->json(['User Berhasil ditambah', new AssetResource($asset)]);
        } else {
            return response()->json(['Gagal', new AssetResource($asset)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset = asset::find($id);
        if (is_null($asset)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new AssetResource($asset)]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->update($request->all());
        return response()->json(['Update Success', $asset]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset = Asset::find($id);
        if (!$asset) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $asset->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
