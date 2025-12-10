<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Challenge;
use App\Models\Game;
use App\Models\Role;
use App\Models\User;
use App\Models\Word;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

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
        return view('challenges.showGame', compact('game'));
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
        $words = Word::offset(0)->limit(5)->get();
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
        $challenge = Challenge::findOrFail($id);
        return view('challenges.show', compact('challenge'));

    }

    public function random()
    {

        //steeds random challenge zichtbaar
        $challenge = Challenge::inRandomOrder()->first();

        if (empty($challenge)) {
            return redirect()->route('challenges.index', compact('challenge'));

        }

        return redirect()->route('challenges.show', $challenge->id);
    }


    public function check(Request $request)
    {
        $id = $request->challenge_id;
        $challenge = Challenge::find($id);

        if ($challenge->right_answer === $request->option_1) {
            $right = 1;
        } else {
            $right = 0;
        }

        return redirect()->route('done', $right);
    }

    public function end($right)
    {
        //Insert points plus and challenge plus
        if ($right) {
            $points = 1;
        } else {
            $points = 0;
        }
        $challenge = 1;
        return view('challenges.end', ['points' => $points, 'challenge' => $challenge]);
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

}
