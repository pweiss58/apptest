<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmOrder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $chosenTickets = Cookie::get('chosenTickets');
        $reservationDate = null;
        $chosenTicketIDs = array();
        $totalPrice = 0;
        $eventIDS = null;

        if ($chosenTickets != null) {

            $reservationDate = DB::table('tickets')->where([
                ['id', '=', $chosenTickets[0]->id],
            ])->value('reservationDate');

            $chosenTickets = collect($chosenTickets);

            foreach ($chosenTickets as $ticket) {

                array_push($chosenTicketIDs, $ticket->id);

                $totalPrice += $ticket->price;
            }

            $eventIDS = DB::table('tickets')->whereIn('id', $chosenTicketIDs)->pluck('event_id')->unique();

        } else $chosenTickets = collect($chosenTickets);


        return view('cart.index', array('chosenTickets' => $chosenTickets, 'chosenTicketIDs' => $chosenTicketIDs, 'eventIDs' => $eventIDS, 'reservationDate' => $reservationDate, 'totalPrice' => $totalPrice));

    }

    public function checkout(Request $request)
    {

        $chosenTickets = Cookie::get('chosenTickets');

        if ($chosenTickets != null) {

            if (Auth::check()) {

                $userID = Auth::id();
                $chosenTickets = collect($chosenTickets);

                foreach ($chosenTickets as $ticket) {

                    DB::table('tickets')->where([
                        ['id', '=', $ticket->id],
                    ])->update([
                        'user_id' => $userID,
                        'available' => false
                    ]);

                }

                return view('cart.checkout', array('chosenTickets' => $chosenTickets));

            } else return redirect()->guest('login');

        } else return redirect()->action('CartController@index');

    }


    public
    function completeCheckout(Request $request)
    {

        $user = Auth::user();
        $userID = Auth::id();
        $currTime = new \DateTime(null, new \DateTimeZone('Europe/Berlin'));

        $orderNr = 0;
        while ($orderNr == 0 || (DB::table('users')->where('customer_id', '=', $orderNr)->first() != null)) {
            $orderNr = random_int(000300000, 999999999);
        }

        $chosenTickets = DB::table('tickets')->where([
            ['user_id', '=', $userID],
            ['paid', '=', false],
        ])->get();

        foreach ($chosenTickets as $ticket) {

            DB::table('tickets')->where([
                ['id', '=', $ticket->id],
            ])->update([
                'orderNr' => $orderNr,
                'paid' => true,
                'available' => false,
                'paymentDate' => $currTime,
                'reservationDate' => null,
                'user_id' => $userID,
            ]);

        }

        \Cookie::queue(\Cookie::forget('chosenTickets'));

        Mail::to($user->email)->send(new ConfirmOrder($user));

        return view('cart.checkoutDone', array('orderNr' => $orderNr));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy()
    {

        $chosenTicketIDs = $_POST['chosenTickets'];

        $chosenTicketIDs = trim($chosenTicketIDs, "[]");

        $chosenTicketIDsArr = explode(",", $chosenTicketIDs);

        for ($i = 0; $i < count($chosenTicketIDsArr); $i++) {

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
