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
        $challenge = Challenge::select('id', 'nature_word')->inRandomOrder()->limit(5)->get();

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
            'words' => ['required', 'array', 'size:5'],
            //checked individually
            'words.' => ['integer', 'exists:challenges,id'],
        ]);


        // array of the ids in variable
        $natureWordsId = $request->input('words');

        //add session so words can be remembered and send to finish
        $request->session()->put('natureWordsId', $natureWordsId);

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
        return redirect()->route('challenges.finish');

    }

    public function finish()
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
        $natureWordsId = session('natureWordsId', []);

        //make sure variable is array, otherwise whereIn won't accept it
        if (!is_array($natureWordsId)) {
            $natureWordsId = [];
        }

        if (empty($natureWordsId)) {
            return redirect()->route('challenges.play');
        }

        //whereIn focuses only on if the ids are the same as the ids of the words on the play page, it skips over the nature words
        $challenge = Challenge::whereIn('id', $natureWordsId)->get();


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

}
