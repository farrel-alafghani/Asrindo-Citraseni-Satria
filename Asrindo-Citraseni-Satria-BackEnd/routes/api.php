<?php

use App\Http\Controllers\API\AssetController;
use App\Http\Controllers\API\ItemAssetController;
use App\Http\Controllers\API\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('user', UserController::class);
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('update');
Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('destroy');

Route::resource('unit', UnitController::class);
Route::put('/unit/update/{id}', [UnitController::class, 'update'])->name('update');
Route::delete('/unit/delete/{id}', [UnitController::class, 'destroy'])->name('destroy');

Route::resource('asset', AssetController::class);
Route::put('/asset/update/{id}', [AssetController::class, 'update'])->name('update');
Route::delete('/asset/delete/{id}', [AssetController::class, 'destroy'])->name('destroy');

Route::resource('itemAsset', ItemAssetController::class);
Route::put('/itemAsset/update/{id}', [ItemAssetController::class, 'update'])->name('update');
Route::delete('/itemAsset/delete/{id}', [ItemAssetController::class, 'destroy'])->name('destroy');
