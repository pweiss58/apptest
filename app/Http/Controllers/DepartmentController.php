<?php

namespace App\Http\Controllers;

use App\Event;
use App\Eventset;
use Illuminate\Http\Request;
use App\Seat;
use Illuminate\Support\Facades\DB;

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
            $aSeat = $request->input('seats');

            foreach($aSeat as $seatNr) {
                $seatX = substr($seatNr, 0, 1);
                $seatX = array_search($seatX, $alphabet) + 1;
                $seatY = substr($seatNr, 1);

                $seatID = DB::table('seats')->where([
                    ['seatX', '=', $seatX],
                    ['seatY', '=', $seatY],
                    ['department_id', '=', $departmentID],
                ])->value('id');

                DB::update('update tickets set available = false where seat_id = ? and event_id = ?', [$seatID, $eventID]);


            }
            return view('welcome');

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
