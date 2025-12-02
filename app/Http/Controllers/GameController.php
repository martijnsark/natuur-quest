<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{

    public function startCoop()
    {
        $userId = auth()->id();

        // find a game waiting for a second player
        $game = Game::whereDoesntHave('users', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })
            ->has('users', '=', 1)
            ->first();

        if ($game) {
            // join the game
            $game->users()->attach($userId);

            // assign a challenge if not yet assigned
            if (!$game->challenge) {
                $challenges = ["challenge1", "challenge2", "challenge3", "challenge4"];
                $game->challenge = $challenges[array_rand($challenges)];
                $game->save();
            }

            session(['game_id' => $game->id]);
            return redirect('/coop-challenge');
        }

        // No waiting game → create a new one
        $newGame = Game::create([]);
        $newGame->users()->attach($userId);

        session(['game_id' => $newGame->id]);
        return view('waiting');
    }


    public function coopChallenge()
    {
        $game = Game::find(session('game_id'));

        if (!$game || $game->users()->count() < 2) {
            return view('waiting');
        }

        return view('challenges.water-trough-challenge', [
            'challenge' => $game->challenge
        ]);
    }
}
