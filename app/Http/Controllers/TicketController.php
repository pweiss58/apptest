<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($eventsetName, $eventNr)
    {
        $eventset = DB::table('eventsets')->where([
            ['name', '=', $eventsetName],
        ])->first();

        $event = DB::table('events')->where([
            ['eventset_id', '=', $eventset->id],
            ['eventNr', '=', $eventNr],
        ])->first();

        $departments = DB::table('departments')->where([
            ['location_id', '=', $event->location_id],
        ])->get();

        return view('ticket.show', array('eventset' => $eventset, 'event' => $event, 'departments' =>$departments));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $eventID)
    {
        $currTime = new \DateTime(null, new \DateTimeZone('Europe/Berlin'));

        $locationID = DB::table('events')->where([
            ['id', '=', $eventID],
        ])->value('location_id');

        $departmentCount = DB::table('locations')->where([
            ['id', '=', $locationID],
        ])->value('departmentCount');

        for ($i = 1; $i <= $departmentCount; $i++){

            if (isset($_POST[$i])){

                $iString = "seats".strval($i);

                $amountOfChosenTickets = $_POST[$iString];

                if ($amountOfChosenTickets > 0) {

                    $chosenTickets = array();
                    $chosenTicketsOld = Cookie::get('chosenTickets');

                    $thisDepartmentID = DB::table('departments')->where([
                        ['location_id', '=', $locationID],
                        ['departmentNr', '=', $i],
                    ])->value('id');

                    $thisDepartmentsSeatIDs = DB::table('seats')->where([
                        ['department_id', '=', $thisDepartmentID],
                    ])->pluck('id');

                    for ($j = 1; $j <= $amountOfChosenTickets; $j++) {

                        $thisTicket = DB::table('tickets')->where([
                            ['event_id', '=', $eventID],
                            ['available', '=', true],
                        ])->whereIn('seat_id', $thisDepartmentsSeatIDs)->first();

                        array_push($chosenTickets, $thisTicket);

                        DB::table('tickets')->where([
                            ['id', '=', $thisTicket->id],
                        ])->update([
                            'available' => false,
                            'reservationDate' => $currTime,
                        ]);
                    }

                    if ($chosenTicketsOld != null) {
                        $chosenTickets = array_merge($chosenTickets, $chosenTicketsOld);
                    }

                    Cookie::queue('chosenTickets', $chosenTickets, 1);

                    return redirect()->action('CartController@index');

                }

                else return back();
            }
        }

       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}