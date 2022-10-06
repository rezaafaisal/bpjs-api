<?php

use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('pengguna', [UserController::class, 'index']);

Route::get('rumah-sakit', [HospitalController::class, 'index']);
Route::get('layanan', [HospitalController::class, 'service']);
