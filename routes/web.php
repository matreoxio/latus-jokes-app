<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\JokeController;

Route::middleware('auth')->group(function () {
    Route::get('/', [JokeController::class, 'showJokesPage'])->name('jokes.page');
});

Auth::routes();
