<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\QueueController;
use App\Http\Controllers\Api\RateController;
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

// autentikasi
Route::post('login', [AuthController::class, 'login']);

Route::get('pengguna', [UserController::class, 'index']);
Route::get('layanan', [HospitalController::class, 'service']);
Route::get('rumah-sakit/{polyclinic_id}', [HospitalController::class, 'index']);

Route::get('dokter/{service_id}', [HospitalController::class, 'doctors']);
Route::get('dokter/waktu/{doctor_id}', [HospitalController::class, 'timetables']);

// antrian
Route::get('antri/{patient_id}', [QueueController::class, 'queues']);
Route::post('antri', [QueueController::class, 'addQueue']);
Route::put('antri/{queue_id}', [QueueController::class, 'doneQueue']);

// rating
Route::post('ulas/{queue_id}', [RateController::class, 'rate']);