<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Main
use App\Http\Controllers\Main\UploadController;
use App\Http\Controllers\Main\HomeController;
// use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\MediaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// // Route::middleware('auth:sanctum')->group(function () {
//     Route::post('upload', [UploadController::class, 'store']);
// // });


// Route::middleware('auth:sanctum')->group(function () {
    Route::post('/upload/init', [UploadController::class, 'init']);
    Route::post('/upload/chunk', [UploadController::class, 'chunk']);
    Route::post('/upload/complete', [UploadController::class, 'complete']);
// });

// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/home/{id}', [HomeController::class, 'show']);
// });

// routes/web.php
// Route::get('/stream/{id}/original', [MediaController::class, 'streamOriginal']);
// Route::get('/media/stream/{id}/{file}', [MediaController::class, 'streamHLS']);

Route::get('/videos/{videoId}/master.m3u8', [MediaController::class, 'streamMaster']);
Route::get('/videos/{videoId}/{resolution}/{file}', [MediaController::class, 'streamVariant']);
