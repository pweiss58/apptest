<?php

namespace App\Http\Controllers;

use App\Event;
use App\Eventset;
use Illuminate\Http\Request;
use App\Seat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
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
    public function show($eventsetId, $eventNr, $departmentNr)
    {
        $event = DB::table('events')->where([
           ['eventset_id', '=', $eventsetId],
           ['eventNr', '=', $eventNr],
        ])->first();

        $eventLocationId = $event->location_id;

        $department = DB::table('departments')->where([
            ['location_id', '=', $eventLocationId],
            ['departmentNr', '=', $departmentNr],
        ])->first();

        return view('department.show', array('department' => $department, 'event' => $event));
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
        $chosenSeats = $request->input('seats');

        $errormessages = [
            'required' => 'Es muss mindestens ein Sitzplatz ausgewählt sein!',
            'max' => 'Es dürfen maximal 5 Sitzplätze ausgewählt sein!',
        ];

        $this->validate($request,[
            'seats' => 'required',
        ], $errormessages);

        $this->validate($request,[
            'seats' => 'max:5',
        ], $errormessages);

        if (Auth::check()) {

            $userID = Auth::id();

            foreach ($chosenSeats as $thisSeat) {
                $seatX = substr($thisSeat, 0, 1);
                $seatX = array_search($seatX, $alphabet) + 1;
                $seatY = substr($thisSeat, 1);

                $seatID = DB::table('seats')->where([
                    ['seatX', '=', $seatX],
                    ['seatY', '=', $seatY],
                    ['department_id', '=', $departmentID],
                ])->value('id');

                DB::update('update tickets set available = false where seat_id = ? and event_id = ?', [$seatID, $eventID]);
                DB::update('update tickets set user_id = ? where seat_id = ? and event_id = ?', [$userID, $seatID, $eventID]);
            }

        } else {

            $chosenTickets = array();

            foreach ($chosenSeats as $thisSeat) {
                $seatX = substr($thisSeat, 0, 1);
                $seatX = array_search($seatX, $alphabet) + 1;
                $seatY = substr($thisSeat, 1);

                $seatID = DB::table('seats')->where([
                    ['seatX', '=', $seatX],
                    ['seatY', '=', $seatY],
                    ['department_id', '=', $departmentID],
                ])->value('id');

                DB::update('update tickets set available = false where seat_id = ? and event_id = ?', [$seatID, $eventID]);

                $thisTicket = DB::table('tickets')->where([
                    ['event_id', '=', $eventID],
                    ['seat_id', '=', $seatID],
                ])->first();

                array_push($chosenTickets, $thisTicket);
            }

            Cookie::queue('chosenTickets', $chosenTickets, 20);
        }

        return redirect()->action('CartController@index');
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
