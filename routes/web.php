<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function(){
   return "halo";
});
// Route::get('/', [AdminController::class, 'index'])->name('dashboard');
// Route::get('verifikasi/{queue_id}', [AdminController::class, 'done'])->name('done');
