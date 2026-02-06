<?php

namespace App\Http\Controllers;

use App\Models\Fact;
use App\Models\Assignment;
use App\Models\Role;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

//        $createGroups = DB::table('users')
//            ->where('user_id', Auth::id())
//            ->count();

        $facts = Fact::inRandomOrder()->first();
        return view('homepage', compact('facts'));
    }

    public function info()
    {
        return view('info');
    }

    public function challengeInfo()
    {
        return view('challenge-info');
    }

    public function shop()
    {
        return view('shop');
    }
}
