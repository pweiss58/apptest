<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $eventsets = DB::table('eventsets')->get();
        $events = DB::table('events')->get();
        return view('admin.control', array('eventsets' => $eventsets), array('events' => $events));
    }

    public function updEventsets() {
        $eventsets = DB::table('eventsets')->get();
        $events = DB::table('events')->get();
        return view('admin.updEventsets');
    }
}
