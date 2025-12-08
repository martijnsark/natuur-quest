<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class ChallengeController extends Controller
{
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
