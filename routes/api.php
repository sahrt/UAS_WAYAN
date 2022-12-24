<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\NameTableController;

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

Route::group(['prefix' => 'nama_table'], function () {
        Route::get('get_all', [NameTableController::class, 'viewAll']);
        Route::post('tambah', [NameTableController::class, 'addNameTable']);
        Route::post('update', [NameTableController::class, 'editNameTable']);
        Route::post('delete', [NameTableController::class, 'deleteNameTable']);
});
