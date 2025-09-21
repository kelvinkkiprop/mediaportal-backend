<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Main
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Main\MediaController;
use App\Http\Controllers\Main\ContentCategoryController;
use App\Http\Controllers\Main\MediaTagController;
use App\Http\Controllers\Main\LiveStreamController;
use App\Http\Controllers\Main\MediaCommentController;
// Manage
use App\Http\Controllers\Manage\UserController;
use App\Http\Controllers\Manage\ReportController;
// use App\Http\Controllers\Manage\OrganizationController;
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

    Route::get('filter-organizations/{category_id}', [UserController::class, 'filterOrganizations']);
});

/*
|--------------------------------------------------------------------------
| ContentCategoryController
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('content-categories', ContentCategoryController::class);
    Route::post('search-content-categories', [ContentCategoryController::class, 'searchItems']);
    Route::get('unpaginated-items-content-categories', [ContentCategoryController::class, 'unpaginatedItems']);
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
Route::get('media/{media}', [MediaController::class, 'show'])->name('media.show');
Route::get('related-media/{id}', [MediaController::class, 'relatedMedia']);
Route::middleware('auth:sanctum')->group(function () {
    // Route::resource('media', MediaController::class);
    Route::resource('media', MediaController::class)->except(['show']);
    Route::post('search-media', [MediaController::class, 'searchItems']);
    Route::get('unpaginated-items-media', [MediaController::class, 'unpaginatedItems']);

    Route::get('my-media/{id}', [MediaController::class, 'myMedia']);
    Route::get('liked-media', [MediaController::class, 'likedMedia']);
    Route::get('history-media', [MediaController::class, 'historyMedia']);
    Route::post('/media/{id}/react', [MediaController::class, 'react']);
    Route::post('/media/{id}/comment', [MediaController::class, 'comment']);
    Route::post('/media/{id}/process', [MediaController::class, 'process']);

    Route::post('/upload/init', [MediaController::class, 'init']);
    Route::post('/upload/chunk', [MediaController::class, 'chunk']);
    Route::post('/upload/complete', [MediaController::class, 'complete']);
});

/*
|--------------------------------------------------------------------------
| MediaCommentController
|--------------------------------------------------------------------------
*/
Route::get('filtered-media-comments/{id}', [MediaCommentController::class, 'filteredMediaComments']);
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('media-comments', MediaCommentController::class);
});

/*
|--------------------------------------------------------------------------
| LiveStreamController
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('live-stream', LiveStreamController::class);
    Route::post('search-live-stream', [LiveStreamController::class, 'searchItems']);
    Route::get('unpaginated-items-live-stream', [LiveStreamController::class, 'unpaginatedItems']);
});
Route::post('/streams/verify', [LiveStreamController::class,'verify']); // called by nginx
Route::post('/streams/stop', [LiveStreamController::class,'stop']);

/*
|--------------------------------------------------------------------------
| ProfileController
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('profiles', ProfileController::class);
    Route::get('unpaginated-items-profiles', [ProfileController::class, 'unpaginatedItems']);

    Route::get('filter-subjects-profiles/{class_level_id}', [ProfileController::class, 'filterSubjects']);
    Route::get('filter-constituencies/{county_id}', [ProfileController::class, 'filterConstituencies']);
    Route::get('filter-wards/{constituency_id}/{class_level_id}', [ProfileController::class, 'filterWards']);

    Route::post('update-notification-profiles', [ProfileController::class, 'updateNotifications']);
    Route::post('update-autoplay-profiles', [ProfileController::class, 'updateAutoplay']);
});


/*
|--------------------------------------------------------------------------
| ReportController
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('reports', ReportController::class);
    Route::get('analytics-reports', [ReportController::class, 'analyticsItems']);
    Route::get('insights-reports', [ReportController::class, 'insightsItems']);
});
