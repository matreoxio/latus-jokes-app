<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JokeController;

Route::middleware('check_api_token')->group(function () {
    Route::get('/get-jokes', [JokeController::class, 'getJokes'])->name('api.jokes');
});