<?php
use App\Http\Controllers\ArtworkController;


Route::get('/', [ArtworkController::class, 'getRandomArtworks']);
