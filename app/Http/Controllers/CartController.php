<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userID = Auth::id();

        $chosenTickets = DB::table('tickets')->where([
            ['user_id', '=', $userID],
            ['paid', '=', false],
        ])->get();

        if (Auth::check())
            return view('cart.index', array('user' => $user, 'chosenTickets' => $chosenTickets));
        else {
            return view('auth.login');
        }

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
    public function show($id)
    {
        //
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
    public function update(Request $request, $eventID, $departmentID)
    {

        $alphabet = range('A', 'Z');
        $aSeat = $request->input('seats');

        if(Auth::check()) {

            $userID = Auth::id();

            foreach ($aSeat as $seatNr) {
                $seatX = substr($seatNr, 0, 1);
                $seatX = array_search($seatX, $alphabet) + 1;
                $seatY = substr($seatNr, 1);

                $seatID = DB::table('seats')->where([
                    ['seatX', '=', $seatX],
                    ['seatY', '=', $seatY],
                    ['department_id', '=', $departmentID],
                ])->value('id');

                DB::update('update tickets set available = false where seat_id = ? and event_id = ?', [$seatID, $eventID]);
                DB::update('update tickets set user_id = ? where seat_id = ? and event_id = ?', [$userID, $seatID, $eventID]);
            }

        }


        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
