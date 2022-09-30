<?php

use Illuminate\Support\Facades\Route;
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
// Route::get('/catatan', [CatatanController::class, 'index']);

Route::get('/create-catatan', [CatatanController::class, 'create']);
Route::post('/save-catatan', [CatatanController::class, 'store'])->name('simpan-catatan');

Route::get('/edit-catatan/{id}', [CatatanController::class, 'edit']);
Route::put('update-catatan/{id}', [CatatanController::class, 'update'])->name('update-catatan');

Route::get('/delete-catatan/{id}', [CatatanController::class, 'destroy']);

Route::resource('catatan', CatatanController::class);