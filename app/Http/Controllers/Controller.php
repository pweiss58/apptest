<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function test()
    {
        // democontent by dr.rill
        $event = new Event;
        $event->name = "Name";
        $event->save();

        $events = DB::table('events')->get();
    }

}
