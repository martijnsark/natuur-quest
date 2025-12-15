<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Fact;

class FactController extends Controller
{
//    public function index()
//    {
//        $categories = Category::with('facts')->get();
//        return view('facts', compact('categories'));
//    }


    public function playFacts()
    {
        $facts = Fact::select('id', 'title', 'content')->inRandomOrder()->first();

        return view('facts', compact('facts'));
    }

}
