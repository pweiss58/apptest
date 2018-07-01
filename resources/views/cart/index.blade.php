<!DOCTYPE html>
<html>
<head>
    <title>Warenkorb</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<h1>Warenkorb</h1>
<table id="tId">
    <p>{{count($chosenTickets)}} Tickets im Warenkorb. {{$reservationDate}}</p>

    @foreach ($chosenTickets as $ticket)
        <tr class="row">

            <?php $thisEventset = DB::table('eventsets')->where('id', '=', DB::table('events')->where('id', '=', $ticket->event_id)->value('eventset_id'))->first(); ?>
                <div class="col-md-3">
                    html to render a product {{ $thisEventset->name }}
                </div>

        </tr>
    @endforeach

</table>

<p id="timer"></p>

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
        countDownDate = new Date(countDownDate.getTime() + 60000);  //1 minute

        var x = setInterval(function () {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";

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

                var data = {
                    chosenTickets: chosenTicketsJSON
                }

            }
        }, 1000);
    }

</script>

</html>