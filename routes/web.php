<?php

use Illuminate\Support\Facades\Route;
// Main
// use App\Http\Controllers\Main\MediaController;

Route::get('/', function () {
    // return view('welcome');
    // ToFrontEnd
    return redirect(config('app.url'));
});
