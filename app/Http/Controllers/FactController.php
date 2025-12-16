<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Fact;
use App\Models\Assignment;

class FactController extends Controller
{
//    public function index()
//    {
//        $categories = Category::with('facts')->get();
//        return view('facts', compact('categories'));
//    }


    public function playFacts(Assignment $assignment)
    {
        // Add the 403 check here
        if ($assignment->user_id !== auth()->id()) {
            abort(403);
        }

        $facts = Fact::select('id', 'title', 'content')
            ->inRandomOrder()
            ->first();

        return view('facts', [
            'facts' => $facts,
            'score' => $assignment->score,
        ]);
    }

}
