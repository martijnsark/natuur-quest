<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\FactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\Assignment;
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

//Route::get('/facts', [\App\Http\Controllers\FactController::class, 'index']);
Route::get('/facts/{assignment}', [FactController::class, 'playFacts'])->middleware(['auth', 'verified'])->name('facts');

//deactivate game route
Route::post('/game/deactivate', [ChallengeController::class, 'deactivateCurrentGame'])->middleware(['auth', 'verified'])->name('game.deactivate');

Route::get('/game-end/', function () {
    return view('game-end');
})->middleware(['auth', 'verified'])->name('game-end');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/info', [PageController::class, 'info'])->name('info');
Route::get('/info/challenge', [PageController::class, 'challengeInfo'])->name('challenge-info');

Route::get('/challenges/connection', [ChallengeController::class, 'connectionTest'])->middleware(['auth', 'verified'])->name('challenges.connection');
Route::post('/challenges/start', [ChallengeController::class, 'connectionSend'])->middleware(['auth', 'verified'])->name('challenges.start');
Route::get('/challenges/show/{id}', [ChallengeController::class, 'showGame'])->middleware(['auth', 'verified'])->name('test.show');
Route::post('/test/assignment', [ChallengeController::class, 'sendAssignment'])->middleware(['auth', 'verified'])->name('assignment.send');

route::get('/challenges', [ChallengeController::class, 'index'])->middleware(['auth', 'verified'])->name('challenges.index');
//route::get('/challenges/random', [ChallengeController::class, 'random'])->name('challenges.random');
route::get('/challenges/details', [ChallengeController::class, 'details'])->middleware(['auth', 'verified'])->name('challenges.details');
//route::get('/challenges/play', [ChallengeController::class, 'play'])->name('challenges.play');

route::get('/challenges/assignment/{challenge}', [ChallengeController::class, 'show'])->middleware(['auth', 'verified'])->name('challenges.show');

// change score route
Route::post('/challenges/update-score', [ChallengeController::class, 'updateScore'])->middleware(['auth', 'verified'])->name('challenges.update-score');

//Route::get('/challenges/end/{right}', [ChallengeController::class, 'end'])->name('done');

//Route::get('/play/{challenge}', [ChallengeController::class, 'play'])->name('challenges.play')

//middelware to make session work, starts session, encrypts cookies, csrf token
//Route::get('/challenges/play', [ChallengeController::class, 'play'])->name('challenges.play');
Route::post('/challenges/check', [ChallengeController::class, 'check'])->name('challenges.check');
Route::get('/challenges/finish/{challenge}', [ChallengeController::class, 'finish'])->name('challenges.finish');

Route::get('/popup/check', function () {
    $assignment = Assignment::with(['role', 'user', 'game.roles'])
        ->where('user_id', Auth::user()->id)
        ->whereHas('game', function ($query) {
            $query->where('active', true);
        })
        ->first();

    return view('components.challenge-popup', compact('assignment'))->render();
})->middleware(['auth', 'verified'])->name('refresh');


require __DIR__ . '/auth.php';
