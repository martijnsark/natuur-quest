<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

Route::view('/', 'homepage')->name('homepage');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/game-end/', function () {
    return view('game-end');
})->name('game-end');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
Route::get('/challenges/details', [ChallengeController::class, 'details'])->name('challenges.details');
Route::get('/challenges/{challenge}', [ChallengeController::class, 'show'])->name('challenges.show');

Route::middleware(['web'])->group(function () {
    Route::get('/play', [ChallengeController::class, 'play'])->name('challenges.play');
    Route::post('/check', [ChallengeController::class, 'check'])->name('challenges.check');
    Route::get('/finish', [ChallengeController::class, 'finish'])->name('challenges.finish');
});


Route::get('/photo-upload', [PhotoController::class, 'create'])->name('photos.create');
Route::post('/photo-upload', [PhotoController::class, 'store'])->name('photos.store');

require __DIR__ . '/auth.php';
