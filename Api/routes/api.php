<?php

use App\Http\Controllers\API\AssetController;
use App\Http\Controllers\API\ItemAssetController;
use App\Http\Controllers\API\MaintenanceController;
use App\Http\Controllers\API\PartController;
use App\Http\Controllers\API\PartOrderController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\UnitController;
use App\Http\Controllers\API\TeamController;

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

Route::resource('task', TaskController::class);
Route::put('/task/update/{id}', [TaskController::class, 'update'])->name('update');
Route::delete('/task/delete/{id}', [TaskController::class, 'destroy'])->name('destroy');

Route::resource('team', TeamController::class);
Route::put('/team/update/{id}', [TeamController::class, 'update'])->name('update');
Route::delete('/team/delete/{id}', [TeamController::class, 'destroy'])->name('destroy');

Route::resource('question', QuestionController::class);
Route::put('/question/update/{id}', [QuestionController::class, 'update'])->name('update');
Route::delete('/question/delete/{id}', [QuestionController::class, 'destroy'])->name('destroy');

Route::resource('part', PartController::class);
Route::put('/part/update/{id}', [PartController::class, 'update'])->name('update');
Route::delete('/part/delete/{id}', [PartController::class, 'destroy'])->name('destroy');

Route::resource('partOrder', PartOrderController::class);
Route::put('/partOrder/update/{id}', [PartOrderController::class, 'update'])->name('update');
Route::delete('/partOrder/delete/{id}', [PartOrderController::class, 'destroy'])->name('destroy');


Route::resource('maintenance', MaintenanceController::class);
Route::put('/maintenance/update/{id}', [MaintenanceController::class, 'update'])->name('update');
Route::delete('/maintenance/delete/{id}', [MaintenanceController::class, 'destroy'])->name('destroy');

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
