<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JokeService;

class JokeController extends Controller
{
    public function showJokesPage()
    {
        // Fetch jokes
        $jokes = JokeService::fetchRandomJokes();
        return view('jokes.index', compact('jokes'));
    }

    public function getJokes() {
        return JokeService::fetchRandomJokes();
    }
}
