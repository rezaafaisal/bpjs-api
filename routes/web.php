<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Models\Role;
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

// Route::get('/', function(){
//    return "halo";
// });

// login
Route::get('masuk', [AuthController::class, 'login'])->name('login');
Route::post('masuk', [AuthController::class, 'check'])->name('check');

Route::middleware(['admin'])->group(function(){
   Route::get('keluar', [AuthController::class, 'logout'])->name('logout');
   
   // Verifikasi antrian
   Route::get('/', [AdminController::class, 'index'])->name('dashboard');
   Route::get('verifikasi/{queue_id}', [AdminController::class, 'done'])->name('done');
   
   // dokter
   Route::get('dokter', [AdminController::class, 'doctor'])->name('doctor');
   Route::post('dokter', [AdminController::class, 'doctor_poly'])->name('doctor_poly');
   
   // review
   Route::get('ulasan', [AdminController::class, 'review'])->name('review');
});