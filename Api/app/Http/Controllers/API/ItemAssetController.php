<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemAssetResource;
use App\Models\Item_asset;
use Illuminate\Http\Request;

class ItemAssetController extends Controller
{
    public function index()
    {
        $data = Item_asset::latest()->get();
        return response()->json([ItemAssetResource::collection($data), 'Program Fecthed']);
    }


    public function store(Request $request)
    {
        $itemAsset = Item_asset::create([
            'itemName' => $request->itemName,
            'serialNumber' => $request->serialNumber,
        ]);
        if ($itemAsset) {
            return response()->json(['User Berhasil ditambah', new ItemAssetResource($itemAsset)]);
        } else {
            return response()->json(['Gagal', new ItemAssetResource($itemAsset)]);
        }
    }


    public function show($id)
    {
        $itemAsset = Item_asset::find($id);
        if (is_null($itemAsset)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new ItemAssetResource($itemAsset)]);
    }


    public function update(Request $request,  $id)
    {
        $itemAsset = Item_asset::findOrFail($id);
        $itemAsset->update($request->all());
        return response()->json(['Update Success', $itemAsset]);
    }


    public function destroy($id)
    {
        $itemAsset = Item_asset::find($id);
        if (!$itemAsset) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $itemAsset->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
