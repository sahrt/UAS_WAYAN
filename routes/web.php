<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\karyawanController;
use App\Http\Controllers\Backend\barangController;
use App\Http\Controllers\Backend\perpustakaanController;
use App\Http\Controllers\Backend\mahasiswaController;
use App\Http\Controllers\Backend\hewanController;
use App\Http\Controllers\Backend\kendaraanController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// untuk route  user


Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
});


Route::prefix('karyawan')->group(function(){
    Route::get('/view', [karyawanController::class, 'karyawanView'])->name('karyawan.view');
    Route::get('/add', [karyawanController::class, 'karyawanAdd'])->name('karyawan.add');
    Route::post('/store', [karyawanController::class, 'karyawanStore'])->name('karyawan.store');

});


Route::prefix('barang')->group(function(){
    Route::get('/view', [barangController::class, 'barangView'])->name('barang.view');
    Route::get('/add', [barangController::class, 'barangAdd'])->name('barang.add');
    Route::post('/store', [barangController::class, 'barangStore'])->name('barang.store');
    Route::get('/edit/{id}', [barangController::class, 'barangEdit'])->name('barang.edit');
    Route::post('/update/{id}', [barangController::class, 'barangUpdate'])->name('barang.update');

});

Route::prefix('perpustakaan')->group(function(){
    Route::get('/view', [perpustakaanController::class, 'perpustakaanView'])->name('perpustakaan.view');
    Route::get('/add', [perpustakaanController::class, 'perpustakaanAdd'])->name('perpustakaan.add');
    Route::post('/store', [perpustakaanController::class, 'perpustakaantore'])->name('perpustakaan.store');
    Route::get('/edit/{id}', [perpustakaanController::class, 'perpustakaanEdit'])->name('perpustakaan.edit');
    Route::post('/update/{id}', [perpustakaanController::class, 'perpustakaanUpdate'])->name('perpustakaan.update');

});

Route::prefix('mahasiswa')->group(function(){
    Route::get('/view', [mahasiswaController::class, 'mahasiswaView'])->name('mahasiswa.view');
    Route::get('/add', [mahasiswaController::class, 'mahasiswaAdd'])->name('mahasiswa.add');
    Route::post('/store', [mahasiswaController::class, 'mahasiswaStore'])->name('mahasiswa.store');
    Route::get('/edit/{id}', [mahasiswaController::class, 'mahasiswaEdit'])->name('mahasiswa.edit');
    Route::post('/update/{id}', [mahasiswaController::class, 'mahasiswaUpdate'])->name('mahasiswa.update');

});

Route::prefix('hewan')->group(function(){
    Route::get('/view', [hewanController::class, 'hewanView'])->name('hewan.view');
    Route::get('/add', [hewanController::class, 'hewanAdd'])->name('hewan.add');
    Route::post('/store', [hewanController::class, 'hewanStore'])->name('hewan.store');
    Route::get('/edit/{id}', [hewanController::class, 'hewanEdit'])->name('hewan.edit');
    Route::post('/update/{id}', [hewanController::class, 'hewanUpdate'])->name('hewan.update');

});

Route::prefix('kendaraan')->group(function(){
    Route::get('/view', [kendaraanController::class, 'kendaraanView'])->name('kendaraan.view');
    Route::get('/add', [kendaraanController::class, 'kendaraanAdd'])->name('kendaraan.add');
    Route::post('/store', [kendaraanController::class, 'kendaraanStore'])->name('kendaraan.store');

});