<?php

use App\Http\Controllers\DeviceApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('checkDeviceHash')->group(function () {
    Route::get('/device/action/get', [DeviceApiController::class, 'apiDeviceActionGet'])->name('api.device.action.get');
    Route::post('/device/action/photo/send', [DeviceApiController::class, 'apiDeviceActionPhotoSend'])->name('api.device.action.photo.send');
});
