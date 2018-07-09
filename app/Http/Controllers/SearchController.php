<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eventset;
use App\Location;
use App\Artist;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //

    public function search(Request $request)
    {
        // kein keyword/ keine results -> errormsg
        $error = ['error' => 'No results. Please use other keywords.'];

        // sollte ein keyword haben
        //if($request->has('search')) {


            $eventsetresults = Eventset::search($request->input('q'))->get();

            return view('search.results', compact('eventsetresults'));

        //}

        //return return view('search.results', compact('eventsetresults', $error));
    }
}
