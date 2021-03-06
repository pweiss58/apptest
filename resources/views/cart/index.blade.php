@extends('layouts.master')


@section ('content')

    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p id="timer" class="text-secondary bg-light" style="margin-top:13px;"></p>
                    <h5 style="margin-top:19px;margin-bottom:0px;margin-right:0px;">Warenkorb</h5>
                    <p class="text-left bg-white"
                       style="margin-top:7px;margin-bottom:36px;color:#000000;font-size:20px;">Bezahlmöglichkeiten:&nbsp;<img
                                src="/img/zahlmoeglichkeit_1.jpeg" style="width:47px;margin-left:34px;"><img
                                src="/img/zahlmoeglichkeit_2.jpeg" style="width:47px;margin-left:13px;"><img
                                src="/img/zahlmoeglichkeit_3.jpeg" style="width:47px;margin-left:13px;">
                        <img
                                src="/img/zahlmoeglichkeit_4.jpeg" style="width:47px;margin-left:13px;"><img
                                src="/img/zahlmoeglichkeit_5.jpeg" style="width:47px;margin-left:13px;"><img
                                src="/img/zahlmoeglichkeit_6.jpeg" style="width:47px;margin-left:13px;"></p>
                    <p class="text-secondary bg-light">{{ count($chosenTickets) }}
                        Tickets, {{ number_format($totalPrice, 2, ",", ".") }} EURO</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <form method="post" action="/checkout">
            {{ csrf_field() }}
            <div class="container">

                @if($eventIDs != null)
                    @foreach($eventIDs as $eventID)

                        <?php

                        $thisEvent = DB::table('events')->where([
                            ['id', '=', $eventID],
                        ])->first();

                        $thisEventset = DB::table('eventsets')->where([
                            ['id', '=', $thisEvent->eventset_id],
                        ])->first();

                        $thisLocation = DB::table('locations')->where([
                            ['id', '=', $thisEvent->location_id],
                        ])->first();

                        $subTotalPrice = 0;

                        ?>

                        <div class="row">
                            <div class="col d-flex justify-content-sm-center align-items-sm-center align-content-sm-center justify-content-md-center align-items-md-center align-content-md-center">
                                <img class="d-inline-flex"
                                     style="background-image:url(&quot;/img/{{ $thisEventset->teaserImage }}&quot;);margin-left:18px;margin-top:0px;width:120px;height:120px;background-repeat:no-repeat;background-position:center;background-size:contain;">
                            </div>
                            <div class="col-md-6 d-flex flex-column align-items-sm-center align-content-sm-center align-items-md-start align-content-md-center align-items-lg-start align-items-xl-start"
                                 style="margin-top:10px;">

                                <p class="d-inline-flex"
                                   style="margin-bottom:4px;font-size:19px;margin-left:12px;">{{ $thisEventset->name }}</p>
                                <p style="margin-bottom:4px;margin-left:12px;color:#6c757d;">
                                    Veranstaltungsort: {{ $thisLocation->city }}, {{ $thisLocation->hallenName }}</p>
                                <p style="margin-left:12px;color:#6c757d;">
                                    Veranstaltungsdatum: {{ date("d.m.Y, H:i", strtotime($thisEvent->startDate)) }}
                                    Uhr</p>
                                <div class="table-responsive">
                                    <table class="table" id="tId">
                                        <thead>
                                        <tr></tr>
                                        </thead>
                                        <tbody>

                                        @foreach($chosenTickets as $ticket)

                                            @if($ticket->event_id == $thisEvent->id)

                                                <?php

                                                $alphabet = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X ', 'Y', 'Z');

                                                $thisSeat = DB::table('seats')->where([
                                                    ['id', '=', $ticket->seat_id],
                                                ])->first();

                                                $thisDepartment = DB::table('departments')->where([
                                                    ['id', '=', $thisSeat->department_id],
                                                ])->first();

                                                $subTotalPrice += $ticket->price;

                                                ?>
                                                <tr>
                                                    <td>
                                                        Sitzplatz {{ $alphabet[$thisSeat->seatX - 1] }}{{ $thisSeat->seatY }}
                                                        ,
                                                        Normalpreis, Parkett {{ $thisDepartment->departmentNr }},
                                                        Reihe {{ $thisSeat->seatX }}, Platz {{ $thisSeat->seatY }}</td>
                                                    <td>{{ number_format($ticket->price, 2, ",", ".") }} EURO</td>
                                                </tr>

                                            @endif

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                <p class="d-inline-flex align-self-end"
                                   style="margin-left:0px;color:#6c757d;margin-right:33px;">
                                    Zwischensumme: {{ number_format($subTotalPrice, 2, ",", ".") }} EURO</p>
                            </div>


                            <div class="col" style="margin-top:10px;">
                            @if($loop->first)
                                <!-- Bestellübersicht -->
                                    <div class="col" style="background-color:#f8f9fa;">
                                        <p style="color:#444f51;"><span
                                                    style="text-decoration: underline;">Bestellübersicht</span>
                                        </p>
                                        <p style="color:#444f51;">Anzahl Tickets gesamt: {{ count($chosenTickets) }}</p>
                                        <p style="color:#444f51;">Summe
                                            gesamt: {{ number_format($totalPrice, 2, ",", ".") }} EURO</p>
                                        <button class="btn btn-primary" type="submit"
                                                style="margin-right:0px;margin-left:0px;margin-bottom:10px;">Zur Kasse
                                        </button>
                                    </div>
                                @endif
                            </div>

                        </div>

                    @endforeach

                @else
                    <p class="d-inline-flex" style="margin-bottom:4px;font-size:19px;margin-left:12px;">Warenkorb ist
                        leer!</p>
                @endif
            </div>
        </form>
    </div>


    <script>

            <?php

            $chosenTicketIDs = array();

            foreach ($chosenTickets as $ticket) {

                array_push($chosenTicketIDs, $ticket->id);
            }

            $chosenTicketIDsJS = json_encode($chosenTicketIDs);
            echo "var chosenTicketIDs = " . $chosenTicketIDsJS . ";\n";

            ?>

        var reservationDate = "<?php echo $reservationDate; ?>";

        if (reservationDate != "") {

            var countDownDate = new Date("<?php echo $reservationDate; ?>");
            countDownDate = new Date(countDownDate.getTime() + 1 * 60000);  //20 minutes

            var x = setInterval(function () {


                var now = new Date().getTime();

                var distance = countDownDate - now;

                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s  bis zum Ablauf der Tickets!";

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("timer").innerHTML = "Tickets abgelaufen!";

                    var chosenTicketsJSON = JSON.stringify(chosenTicketIDs);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "/cart",
                        data: {chosenTickets: chosenTicketsJSON},

                    });

                }

            }, 1000);
        }
    </script>
@endsection