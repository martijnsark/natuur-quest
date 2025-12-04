<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
route::get('/challenges/random', [ChallengeController::class, 'random'])->name('challenges.random');
route::get('/challenges/{challenge}', [ChallengeController::class, 'show'])->name('challenges.show');
Route::post('/challenges/check', [ChallengeController::class, 'check'])->name('handed-in');
Route::get('/challenges/end/{right}', [ChallengeController::class, 'end'])->name('done');

require __DIR__ . '/auth.php';
