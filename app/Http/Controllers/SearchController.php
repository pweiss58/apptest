<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eventset;


class SearchController extends Controller
{
    //

    public function search(Request $request)
    {
        // kein keyword/ keine results -> errormsg
        $errors = ['noresults' => "No results. Please use other keywords.",];


            $eventsetresults = Eventset::search($request->input('q'))->get();

            return view('search.results', compact('eventsetresults'), array('errors' => $errors));
    }
}
