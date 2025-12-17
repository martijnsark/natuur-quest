<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Fact;
use App\Models\Photo;
use App\Models\Word;
use Illuminate\Http\Request;

class FactController extends Controller
{
    public function playFacts(Assignment $assignment)
    {
        // Eager load voor zekerheid
        $assignment->load(['game', 'words', 'user']);

        $game = $assignment->game;
        $score = (int) ($assignment->score ?? 0);

        // Random fact
        $facts = Fact::inRandomOrder()->first();

        // Photo round word_id: 1 vaste per game
        // Als hij nog niet bestaat: pak een random word uit DB en sla hem op
        if ($game && !$game->photo_round_word_id) {
            $randomWordId = Word::inRandomOrder()->value('id');
            $game->photo_round_word_id = $randomWordId;
            $game->save();
        }

        $photoWordId = $game?->photo_round_word_id;

        // Heeft deze speler al geüpload voor de photo-round?
        $hasUploaded = false;
        if ($photoWordId) {
            $hasUploaded = Photo::where('assignment_id', $assignment->id)
                ->where('word_id', $photoWordId)
                ->exists();
        }

        // Is de photo-round al beoordeeld door spelleider?
        $photoJudged = (bool) ($game?->photo_round_judged_at);

        return view('facts', [
            'facts' => $facts,
            'score' => $score,
            'assignment' => $assignment,
            'photoWordId' => $photoWordId,
            'hasUploaded' => $hasUploaded,
            'photoJudged' => $photoJudged,
        ]);
    }
}
