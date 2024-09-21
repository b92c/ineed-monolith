<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

const PROFILE_PATH = '/profile';

// App routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('about', function () {
    return view('about');
})->name('about');

// Route::get('advertising', function () {
//     return view('advertising');
// })->name('advertising');

Route::get('/search', [SearchController::class, 'search'])->name('search');

// Pre-load cities
Route::get('/city', function () {
    $jsonData = Storage::get('cities.json');
    return response()->json(json_decode($jsonData));
});


Route::post('destroy', [AuthenticatedSessionController::class, 'destroy'])->name('destroy');

// Dashboard routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get(PROFILE_PATH, [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch(PROFILE_PATH, [ProfileController::class, 'update'])->name('profile.update');
    Route::delete(PROFILE_PATH, [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require_once __DIR__ . '/auth.php';
