<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController; // Import Controller kita

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Satu-satunya rute untuk halaman utama kita
Route::get('/', [PortfolioController::class, 'index']);
