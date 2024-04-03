<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function () {
    \Auth::logout();
    return redirect('/');
});

Route::group(['middleware' => ['auth', 'cekLevel:Admin']], function () {
    Route::get('/halaman1', [App\Http\Controllers\HomeController::class, 'halamanSatu'])->name('index.halaman1');
    Route::get('/halaman2', [App\Http\Controllers\HomeController::class, 'halamanDua'])->name('index.halaman2');
});
