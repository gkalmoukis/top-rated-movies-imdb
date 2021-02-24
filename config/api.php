<?php

return [
    'base_url' => env('IMDB_API_URL', 'http://localhost:8001'),
    'headers' => [
        'X-Rapidapi-Key' => env('RAPIDAPI_KEY', ''),
        'x-rapidapi-host' => 'imdb8.p.rapidapi.com'
    ],
];