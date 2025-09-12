<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Main
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Main\MediaController;
use App\Http\Controllers\Main\MediaCategoryController;
use App\Http\Controllers\Main\MediaTagController;
// Manage
use App\Http\Controllers\Manage\UserController;
// use App\Http\Controllers\Manage\InterestController;
// use App\Http\Controllers\Manage\InstitutionController;
// use App\Http\Controllers\Manage\PaymentController;
// // Settings
use App\Http\Controllers\Settings\ProfileController;


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
// Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('dashboard2', [DashboardController::class, 'index2']);
    Route::get('search-suggestions', [DashboardController::class, 'searchSuggestions']);
// });

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
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('users', UserController::class);
    Route::post('search-users', [UserController::class, 'searchItems']);
    Route::get('unpaginated-items-users', [UserController::class, 'unpaginatedItems']);
});

/*
|--------------------------------------------------------------------------
| MediaCategoryController
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('media-categories', MediaCategoryController::class);
    Route::post('search-media-categories', [MediaCategoryController::class, 'searchItems']);
    Route::get('unpaginated-items-media-categories', [MediaCategoryController::class, 'unpaginatedItems']);
});

/*
|--------------------------------------------------------------------------
| MediaTagController
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('media-tags', MediaTagController::class);
    Route::post('search-media-tags', [MediaTagController::class, 'searchItems']);
    Route::get('unpaginated-items-media-tags', [MediaTagController::class, 'unpaginatedItems']);
});

/*
|--------------------------------------------------------------------------
| MediaController
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('media', MediaController::class);
    Route::post('search-media', [MediaController::class, 'searchItems']);
    Route::get('unpaginated-items-media', [MediaController::class, 'unpaginatedItems']);

    Route::post('/upload/init', [MediaController::class, 'init']);
    Route::post('/upload/chunk', [MediaController::class, 'chunk']);
    Route::post('/upload/complete', [MediaController::class, 'complete']);
});

/*
|--------------------------------------------------------------------------
| ProfileController
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('profiles', ProfileController::class);
    Route::get('unpaginated-items-profiles', [ProfileController::class, 'unpaginatedItems']);
    Route::get('filter-subjects-profiles/{class_level_id}', [ProfileController::class, 'filterSubjects']);
    Route::post('update-notification-profiles', [ProfileController::class, 'updateNotifications']);
    Route::get('filter-constituencies/{county_id}', [ProfileController::class, 'filterConstituencies']);
    Route::get('filter-wards/{constituency_id}/{class_level_id}', [ProfileController::class, 'filterWards']);
});

