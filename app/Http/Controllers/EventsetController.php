<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class EventsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($eventsetName)
    {
        $eventset = DB::table('eventsets')->where([
            ['name', '=', $eventsetName],
        ])->first();

        $events = DB::table('events')->where([
            ['eventset_id', '=', $eventset->id],
        ])->get();

        $comments = DB::table('comments')->where([
            ['eventset_id', '=', $eventset->id]
        ])->get();

        return view('eventset.show', array('eventset' => $eventset, 'events' => $events, 'comments' => $comments));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $eventsetName)
    {

        $authorName = $request->input('authorName');
        $authorEmail = $request->input('authorEmail');
        $text = $request->input('text');

        $thisEventsetID = DB::table('eventsets')->where([
            ['name', '=', $eventsetName],
        ])->value('id');

        $request->validate([
            'authorName' => 'required|string|min:6|max:255',
            'authorEmail' => 'required|email|min:2|max:255',
            'text' => 'required',
        ]);

        DB::table('comments')->insert(
            ['authorName' => $authorName, 'authorEmail' => $authorEmail, 'text' => $text, 'eventset_id' => $thisEventsetID]
        );

        return redirect()->action('EventsetController@show', array('eventsetName' => $eventsetName));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);

            if (isset($_POST[$id])) {
                DB::table('eventsets')->where('id','=',$id+2)->delete();
            }

            if($user->admin == 1) {
                DB::table('eventsets')->where('id','=',$id)->delete();
            }

            //test
            if (Auth::user()->isAdmin()) {
                DB::table('eventsets')->where('id','=',$id+1)->delete();
            }

            return view('AdminController@admin');
        }
    }
}
