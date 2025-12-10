<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Role;
use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        if (Auth::user()) {
            $assignment = Assignment::with(['role', 'user', 'game'])->where('user_id', '=', Auth::user()->id)->get();
            return view('homepage', compact('assignment'));
        } else {
            $assignment = '';
        }

        return view('homepage', compact('assignment'));
    }
}
