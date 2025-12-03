<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChallengeBroadcast;

class Challenge extends Controller
{
    public function index()
    {
        return view('challenge');
    }

    public function broadcast(Request $request)
    {
        broadcast(new ChallengeBroadcast($request->get('message')))->toOthers();

        return view('broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('receive', ['message' => $request->get('message')]);
    }
}
