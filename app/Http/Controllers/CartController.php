<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
        /*if (Auth::check()) {

            $user = Auth::user();
            $userID = Auth::id();

            $chosenTickets = DB::table('tickets')->where([
                ['user_id', '=', $userID],
                ['paid', '=', false],
            ])->get();

            $chosenTicketsCount = DB::table('tickets')->where([
                ['user_id', '=', $userID],
                ['paid', '=', false],
            ])->count();

            $reservationDate = null;

            if ($chosenTicketsCount > 0) {
                $reservationDate = $chosenTickets[0]->reservationDate;
            }

            return view('cart.index', array('user' => $user, 'chosenTickets' => $chosenTickets, 'reservationDate' => $reservationDate));
        }

        else {*/

            $chosenTickets = Cookie::get('chosenTickets');
            $reservationDate = null;

            if ($chosenTickets != null) {

                $reservationDate = DB::table('tickets')->where([
                    ['id', '=', $chosenTickets[0]->id],
                ])->value('reservationDate');
            }

            $chosenTickets = collect($chosenTickets);

            return view('cart.index', array('chosenTickets' => $chosenTickets, 'reservationDate' => $reservationDate));
        //}

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

        $chosenTicketIDs = $_POST['chosenTickets'];

        $chosenTicketIDs = trim($chosenTicketIDs, "[]");

        $chosenTicketIDsArr = explode(",", $chosenTicketIDs);

        for ($i = 0; $i < count($chosenTicketIDsArr); $i++){

            DB::table('tickets')->where([
                ['id', '=', $chosenTicketIDsArr[$i]]
            ])->update([
                'reservationDate' => null,
                'user_id' => null,
                'available' => true,
            ]);
        }
    }
}
