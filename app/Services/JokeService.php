<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JokeService
{

    public static function fetchRandomJokes()
    {
        // Get jokes from the API
        $response = Http::get('https://official-joke-api.appspot.com/jokes/programming/ten');

        $allJokes = $response->json() ?? [];

        // Shuffle jokes 
        shuffle($allJokes);

        // Get 3 jokes
        $randomJokes = array_slice($allJokes, 0, 3);

        return $randomJokes;
    }

}
