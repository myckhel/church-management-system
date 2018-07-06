<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $events = $user->isAdmin() ? Event::all() : Event::where('branch_id', $user->branchcode)->get();
        //$events = Event::all();
        return view('dashboard.index', compact('events'));
    }
}
