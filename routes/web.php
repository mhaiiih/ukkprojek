<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatatanController;

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
    return view('starter');
});

Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('proses_login',[AuthController::class,'proses_login'])->name('proses_login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['cek_login:admin']], function() {
        Route::get('admin',[LoginController::class,'admin'])->name('admin');
        Route::get('catatan', [CatatanController::class, 'index']);
        Route::get('catatan/create', [CatatanController::class, 'create']);
        Route::post('catatan/store', [CatatanController::class, 'store'])->name('simpan-catatan');
        Route::get('catatan/edit/{id}', [CatatanController::class, 'edit']);
        Route::put('catatan/update/{id}', [CatatanController::class, 'update'])->name('update-catatan');
        Route::get('catatan/delete/{id}', [CatatanController::class, 'destroy']);

    });
    Route::group(['middleware' => ['cek_login:user']], function() {
       
        
    });

});
    
// Route::get('/catatan', [CatatanController::class, 'index']);

// Route::get('/create-catatan', [CatatanController::class, 'create']);
// Route::post('/save-catatan', [CatatanController::class, 'store'])->name('simpan-catatan');

// Route::get('/edit-catatan/{id}', [CatatanController::class, 'edit']);
// Route::put('update-catatan/{id}', [CatatanController::class, 'update'])->name('update-catatan');

// Route::get('/delete-catatan/{id}', [CatatanController::class, 'destroy']);

