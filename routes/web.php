<?php

use Illuminate\Support\Facades\Route;

// Main
use App\Http\Controllers\Main\MediaController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/media/{videoId}/{file}', [MediaController::class, 'stream']);


// Route::get('/videos/{folder}/{file}', function ($folder, $file) {
//     // return $file;
//     $path = storage_path("app/public/videos/processed/$folder/$file");

//     if (!file_exists($path)) {
//         abort(404);
//     }

//     return Response::file($path, [
//         'Access-Control-Allow-Origin' => '*',
//         'Access-Control-Allow-Methods' => 'GET, OPTIONS',
//         'Access-Control-Allow-Headers' => 'Origin, Content-Type, Accept',
//     ]);
// });


Route::get('/videos/{id}/{file}', [MediaController::class, 'stream']);
