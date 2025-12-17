<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Fact;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;

class FactController extends Controller
{
//    public function index()
//    {
//        $categories = Category::with('facts')->get();
//        return view('facts', compact('categories'));
//    }


    public function playFacts(Assignment $assignment)
    {

        // double check user sign-in just in case
        if (!Auth::check()) {
            abort(403, 'U hebt geen toegang tot deze pagina.');
        }

        // Add the 403 check here
        if ($assignment->user_id !== auth()->id()) {
            abort(403, 'U hebt geen toegang tot deze pagina.');
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
