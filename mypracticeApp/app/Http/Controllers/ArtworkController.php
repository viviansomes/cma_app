<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller as BaseController;

class ArtworkController extends BaseController
{
    public function getRandomArtworks()
    {
        $response = Http::get('https://openaccess-api.clevelandart.org/api/artworks', [
            'q' => 'random',
            'limit' => 10 // Adjust limit as needed
        ]);

        return $response->json();
    }
}
