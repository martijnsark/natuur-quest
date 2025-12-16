<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\FactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController;
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
Route::get('/facts/{assignment}', [FactController::class, 'playFacts'])->name('facts');

//deactivate route
Route::post('/game/deactivate', [ChallengeController::class, 'deactivateCurrentGame'])->name('game.deactivate');

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

Route::get('/info', [PageController::class, 'info'])->name('info');
Route::get('/info/challenge', [PageController::class, 'challengeInfo'])->name('challenge-info');

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

// change score route
Route::post('/challenges/update-score', [ChallengeController::class, 'updateScore'])->name('challenges.update-score');

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
})->name('refresh');

Route::get('/photo-upload', [PhotoController::class, 'create'])->name('photos.create');
Route::post('/photo-upload', [PhotoController::class, 'store'])->name('photos.store');

Route::get('/test/{game}/judge-photos', [ChallengeController::class, 'judgePhotos'])->name('test.judgePhotos');
Route::post('/test/{game}/judge-photos', [ChallengeController::class, 'storeJudgePhotos'])->name('test.judgePhotos.store');


require __DIR__ . '/auth.php';
