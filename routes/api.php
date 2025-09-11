<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Main
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Main\UploadController;
use App\Http\Controllers\Main\MediaController;
use App\Http\Controllers\Main\MediaCategoryController;
use App\Http\Controllers\Main\MediaTagController;
// Manage
use App\Http\Controllers\Manage\UserController;
// use App\Http\Controllers\Manage\InterestController;
// use App\Http\Controllers\Manage\InstitutionController;
// use App\Http\Controllers\Manage\PaymentController;
// // Settings
// use App\Http\Controllers\Settings\PaymentMethodController;
// use App\Http\Controllers\Settings\ProfileController;
// // Payments
// use App\Http\Controllers\Payments\MpesaController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| AuthController
|--------------------------------------------------------------------------
*/
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);
Route::post('recover-password', [AuthController::class, 'recoverPassword']);
Route::get('unpaginated-items-register', [AuthController::class, 'unpaginatedItems']);
Route::get('/check-username/{username}', [AuthController::class, 'checkUsername']);
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('change-password', [AuthController::class, 'changePassword']);
    Route::post('verify-email', [AuthController::class, 'verifyEmail']);
    Route::get('resend-verification-code', [AuthController::class, 'resendVerificationCode']);
});

/*
|--------------------------------------------------------------------------
| DashboardController
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('dashboard2', [DashboardController::class, 'index2']);
    Route::get('filter-interests/{id}', [DashboardController::class, 'filterInterests']);
    Route::get('search-suggestions', [DashboardController::class, 'searchSuggestions']);
});

/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
*/
Route::get('home', [HomeController::class, 'index']);
Route::get('home/filter-course-modules/{course_category_id}', [HomeController::class, 'filter']);
Route::get('home/search-course-modules/{term}', [HomeController::class, 'search']);

/*
|--------------------------------------------------------------------------
| UserController
|--------------------------------------------------------------------------
*/
// Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('users', UserController::class);
    Route::post('search-users', [UserController::class, 'searchItems']);
    Route::get('unpaginated-items-users', [UserController::class, 'unpaginatedItems']);
// });

/*
|--------------------------------------------------------------------------
| MediaCategoryController
|--------------------------------------------------------------------------
*/
// Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('media-categories', MediaCategoryController::class);
    Route::post('search-media-categories', [MediaCategoryController::class, 'searchItems']);
    Route::get('unpaginated-items-media-categories', [MediaCategoryController::class, 'unpaginatedItems']);
// });


/*
|--------------------------------------------------------------------------
| MediaTagController
|--------------------------------------------------------------------------
*/
// Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('media-tags', MediaTagController::class);
    Route::post('search-media-tags', [MediaTagController::class, 'searchItems']);
    Route::get('unpaginated-items-media-tags', [MediaTagController::class, 'unpaginatedItems']);
// });


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



