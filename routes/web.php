<?php

use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [SubmissionController::class, 'test']);
