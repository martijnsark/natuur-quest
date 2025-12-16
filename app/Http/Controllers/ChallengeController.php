<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Challenge;
use App\Models\Game;
use App\Models\Role;
use App\Models\User;
use App\Models\Word;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function connectionTest()
    {
        $friends = User::all(); //this has to be the friends when we have that part
        $roles = Role::all(); //takes the roles out of the database
        return view('challenges.connection', compact('friends'), compact('roles'));
    }

    public function connectionSend(Request $request)
    {

        $request->validate([
            '1' => 'required|different:2|different:3',
            '2' => 'required|different:1|different:3',
            '3' => 'required|different:1|different:2'
        ]);

        //makes a game and saves it
        $game = new Game();
        $game->save();

        $game->roles()->attach('1', ['user_id' => $request->input('1')]);

        //connects the rolls to the game and with the user and puts this in database
        foreach ($request->except('_token', '1') as $roleId => $userId) {

            $game->roles()->attach($roleId, [
                'user_id' => $userId
            ]);
        }

        //loads the show page and sends the game id
        return redirect()->route('test.show', $game->id);
    }

    public function showGame(string $id)
    {
        //finds the game and sends it to the page
        $game = Game::find($id);
        if ($game !== null) {
            return view('challenges.showGame', compact('game'));
        } else {
            return redirect()->route('home');
        }
    }

    public function sendAssignment(Request $request)
    {
        //makes the assignment and sends it to the user
        $assignment = new Assignment();
        $assignment->user_id = $request->input('user_id');
        $assignment->game_id = $request->input('game_id');
        $assignment->role_id = $request->input('role_id');
        $assignment->save();

        //connects the words with the assignments
        $words = Word::select('id', 'name')->inRandomOrder()->limit(5)->get();
        $assignment->words()->sync($words);

        return redirect()->route('test.show', $request->input('game_id'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::all();
        return view('challenges.index', compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $challenge = Assignment::find($id);
        return view('challenges.play', compact('challenge'));
    }

    public function details()
    {
        $challenge = Challenge::all();

        if (empty($challenge)) {
            return redirect()->route('challenges.index', compact('challenge'));
        }

        return view('challenges.details', compact('challenge'));

    }

    public function play()
    {
        //selects the id and the belonging nature word, does this randomly, max 5 words get selected and shown at play
        $challenge = Word::select('id', 'nature_word')->inRandomOrder()->limit(5)->get();

        if (empty($challenge)) {
            return redirect()->route('challenges.index', compact('challenge'));
        }

        return view('challenges.play', compact('challenge'));
    }


//    public function random()
//    {
//
//        //steeds random challenge zichtbaar
//        $challenge = Challenge::inRandomOrder()->limit(5)->get('nature_word');
//
//
//
//        return redirect()->route('challenges.play');
//    }


    public function check(Request $request)
    {

        $request->validate([
            //checked as the array
//            'words' => ['required', 'array', 'size:5'],
            //checked individually
//            'words.' => ['integer', 'exists:words,id'],
            'challenge' => 'required',
        ]);


        // array of the ids in variable
        $challengeId = $request->input('challenge');
        $challenge = Assignment::find($challengeId);

        //add session so words can be remembered and send to finish
//        $request->session()->put('natureWordsId', $natureWordsId);

//        $id = $request->challenge_id;
//        $challenge = Challenge::find($id);
//
//        if ($challenge->right_answer === $request->option_1) {
//            $right = 1;
//        } else {
//            $right = 0;
//        }
//
//        return redirect()->route('done', $right);
        return redirect()->route('facts', ['assignment' => $challenge->id]);

    }

    public function finish($challenge)
    {
        //Insert points plus and challenge plus
//        if ($right) {
//            $points = 1;
//        } else {
//            $points = 0;
//        }
//        $challenge = 1;
//        return view('challenges.end', ['points' => $points, 'challenge' => $challenge]);


        //looks for session variable with key naturewordsid, this is an array and if not give back empty array
//        $natureWordsId = session('natureWordsId', []);
//
//        //make sure variable is array, otherwise whereIn won't accept it
//        if (!is_array($natureWordsId)) {
//            $natureWordsId = [];
//        }
//
//        if (empty($natureWordsId)) {
//            return redirect()->route('challenges.play');
//        }

        //whereIn focuses only on if the ids are the same as the ids of the words on the play page, it skips over the nature words
//        $challenge = Challenge::whereIn('id', $natureWordsId)->get();

        $challenge = Assignment::find($challenge);
        return view('challenges.finish', compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // handles score updates
    public function updateScore(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:assignments,id',
            'correct' => 'nullable|array',
            'correct.*' => 'exists:words,id',
        ]);

        // get the assignment
        $assignment = Assignment::find($request->input('assignment_id'));

        // count the checked words
        $score = count($request->input('correct', []));

        // save the score
        $assignment->score = $score;
        $assignment->save();

        // Update the user's balance based on score
        $user = $assignment->user;
        // multiply score by 100
        $user->balance += $score * 100;
        $user->save();

        return redirect()->route('test.show', ['id' => $assignment->game->id]);
    }

    public function deactivateCurrentGame(Request $request)
    {
        $user = $request->user();

        $game = Game::whereHas('users', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->where('active', true)->first();

        if ($game) {
            $game->active = false;
            $game->save();
        }

        return redirect()->route('home');
    }


    public function judgePhotos(Request $request, string $game)
    {
        $game = Game::findOrFail($game);

        $refereeRoleId = 1;

        $playerIds = DB::table('user_game_role')
            ->where('game_id', $game->id)
            ->where('role_id', '!=', $refereeRoleId)
            ->pluck('user_id')
            ->values();

        if ($playerIds->count() < 2) {
            return view('challenges.judge-photos', [
                'game' => $game,
                'entries' => [],
                'word' => null,
                'wordId' => null,
                'error' => 'Er zijn nog niet 2 spelers gekoppeld aan dit spel.',
            ]);
        }

        $assignments = Assignment::where('game_id', $game->id)
            ->whereIn('user_id', $playerIds)
            ->get();

        if ($assignments->count() < 2) {
            return view('challenges.judge-photos', [
                'game' => $game,
                'entries' => [],
                'word' => null,
                'wordId' => null,
                'error' => 'Er zijn nog geen assignments voor beide spelers.',
            ]);
        }

        $assignmentIds = $assignments->pluck('id');

        // 1) Als ?word_id is meegegeven: gebruik die
        $wordId = $request->query('word_id');

        // 2) Anders: zoek een word_id waar minimaal 2 verschillende assignments een foto voor hebben
        if (!$wordId) {
            $wordId = DB::table('photos')
                ->selectRaw('word_id, COUNT(DISTINCT assignment_id) as cnt, MAX(id) as max_id')
                ->whereIn('assignment_id', $assignmentIds)
                ->groupBy('word_id')
                ->having('cnt', '>=', 2)
                ->orderByDesc('max_id')
                ->value('word_id');
        }

        // 3) Fallback: als er nog geen “beide spelers” match is, pak nieuwste foto (kan dan 1 kant leeg zijn)
        if (!$wordId) {
            $wordId = Photo::whereIn('assignment_id', $assignmentIds)
                ->latest('id')
                ->value('word_id');
        }

        if (!$wordId) {
            return view('challenges.judge-photos', [
                'game' => $game,
                'entries' => [],
                'word' => null,
                'wordId' => null,
                'error' => 'Er zijn nog geen foto’s ingezonden om te beoordelen.',
            ]);
        }

        $entries = $assignments->map(function ($assignment) use ($wordId) {
            $photo = Photo::where('assignment_id', $assignment->id)
                ->where('word_id', $wordId)
                ->latest('id')
                ->first();

            return [
                'user' => $assignment->user,
                'assignment' => $assignment,
                'photo' => $photo,
            ];
        });

        return view('challenges.judge-photos', [
            'game' => $game,
            'entries' => $entries,
            'word' => Word::find($wordId),
            'wordId' => $wordId,
            'error' => null,
        ]);
    }


    public function storeJudgePhotos(Request $request, string $game)
    {
        $game = Game::findOrFail($game);

        $data = $request->validate([
            'word_id' => ['required', 'integer', 'exists:words,id'],
            'winner_user_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        // Check: winnaar moet speler zijn binnen deze game (niet spelleider)
        $refereeRoleId = 1;

        $isPlayerInGame = DB::table('user_game_role')
            ->where('game_id', $game->id)
            ->where('user_id', $data['winner_user_id'])
            ->where('role_id', '!=', $refereeRoleId)
            ->exists();

        if (!$isPlayerInGame) {
            return back()->withErrors(['winner_user_id' => 'Deze speler hoort niet bij dit spel (of is de spelleider).']);
        }

        // Pak assignment van winnaar
        $winnerAssignment = Assignment::where('game_id', $game->id)
            ->where('user_id', $data['winner_user_id'])
            ->first();

        if (!$winnerAssignment) {
            return back()->withErrors(['winner_user_id' => 'Geen assignment gevonden voor deze speler in dit spel.']);
        }

        // +1 score
        $winnerAssignment->increment('score', 1);

        // +100 balance
        $winnerUser = $winnerAssignment->user;
        $winnerUser->balance += 100;
        $winnerUser->save();

        return redirect()
            ->route('test.show', ['id' => $game->id])
            ->with('success', 'Winnaar gekozen en punt gegeven!');
    }
}
