<?php

namespace App\Http\Controllers;

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

        $user = Auth::user();

        if ($user) {
            $balance = $user->balance;
        } else {
            $balance = 0;

        }


        return view('homepage', compact('user', 'balance'));
    }
}
