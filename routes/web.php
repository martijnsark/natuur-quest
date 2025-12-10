<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/login', function () {
    return redirect()->route('login');
});


//register
Route::get('/register', function () {
    return redirect()->route('register');
});


//home
Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/profiel', function () {
    return view('profiel');
})->middleware(['auth', 'verified'])->name('profiel');

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

Route::get('/challenges/connection', [ChallengeController::class, 'connectionTest'])
    ->name('challenges.connection');
Route::post('/challenges/start', [ChallengeController::class, 'connectionSend'])
    ->name('challenges.start');
Route::get('/challenges/show/{id}', [ChallengeController::class, 'showGame'])->name('test.show');
Route::post('/test/assignment', [ChallengeController::class, 'sendAssignment'])->name('assignment.send');

route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
//route::get('/challenges/random', [ChallengeController::class, 'random'])->name('challenges.random');
route::get('/challenges/details', [ChallengeController::class, 'details'])->name('challenges.details');
//route::get('/challenges/play', [ChallengeController::class, 'play'])->name('challenges.play');

route::get('/challenges/assignment/{challenge}', [ChallengeController::class, 'show'])->name('challenges.show');

//Route::get('/challenges/end/{right}', [ChallengeController::class, 'end'])->name('done');

//middelware to make session work, starts session, encrypts cookies, csrf token
Route::middleware(['web'])->group(function () {
    Route::get('/play', [ChallengeController::class, 'play'])->name('challenges.play');
    Route::post('/check', [ChallengeController::class, 'check'])->name('challenges.check');
    Route::get('/finish', [ChallengeController::class, 'finish'])->name('challenges.finish');
});


require __DIR__ . '/auth.php';
