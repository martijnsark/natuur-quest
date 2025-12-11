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
//        if (Auth::user()) {
//            $assignment = Assignment::first()->with(['role', 'user', 'game'])->where('user_id', '=', Auth::user()->id)->where('active', '=', 1)->get();
//            return view('homepage', compact('assignment'));
//        } else {
//            $assignment = '';
//        }

        //return view('homepage', compact('assignment'));
        return view('homepage');
    }
}
