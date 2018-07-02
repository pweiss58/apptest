<!DOCTYPE html>
<html>
<head>
    <title>Warenkorb</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<h1>Warenkorb</h1>

<p id="timer"></p>

<table id="tId">
    <p>{{count($chosenTickets)}} Tickets im Warenkorb. {{$reservationDate}}</p>

    @foreach ($chosenTickets as $ticket)
        <tr class="row">

            <?php
            $thisEventset = DB::table('eventsets')->where('id', '=', DB::table('events')->where('id', '=', $ticket->event_id)->value('eventset_id'))->first();
            $thisEvent = DB::table('events')->where([
                ['id', '=', $ticket->event_id],
            ])->first(); ?>

            <div class="col-md-3">
                {{ $thisEventset->name }} am {{ $thisEvent->startDate}}
            </div>

        </tr>
    @endforeach

</table>

<div>

    <button type="button" onclick="function checkout(){

    }">Weiter zu Kasse</button>

</div>

</body>

<script>

    <?php

    $chosenTicketIDs = array();

    foreach($chosenTickets as $ticket){

        array_push($chosenTicketIDs, $ticket->id);
    }

        $chosenTicketIDsJS = json_encode($chosenTicketIDs);
    echo "var chosenTicketIDs = ". $chosenTicketIDsJS . ";\n";

    ?>

    var reservationDate = "<?php echo $reservationDate; ?>";

    if (reservationDate != "") {

        var countDownDate = new Date("<?php echo $reservationDate; ?>");
        countDownDate = new Date(countDownDate.getTime() + 20 * 60000);  //20 minutes

        var x = setInterval(function () {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s  bis zum Ablauf der Tickets!";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";

                var chosenTicketsJSON = JSON.stringify(chosenTicketIDs);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/cart",
                    data: { chosenTickets: chosenTicketsJSON },

                });

            }
        }, 1000);
    }

</script>

</html>