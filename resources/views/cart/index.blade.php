<!DOCTYPE html>
<html>
<head>
    <title>Warenkorb</title>
</head>
<body>
<h1>Warenkorb</h1>
<table id="tId">
    <p>{{count($chosenTickets)}} Tickets im Warenkorb.</p>

    @foreach ($chosenTickets as $ticket)
        <tr class="row">

            <?php $thisEventset = DB::table('eventsets')->where('id', '=', DB::table('events')->where('id', '=', $ticket->event_id)->value('eventset_id'))->first(); ?>
                <div class="col-md-3">
                    html to render a product {{ $thisEventset->name }}
                </div>

        </tr> <!-- end row -->
    @endforeach

</table>
<script>







<?php // $unpaidTickets =  DB::table('tickets')->where([['user_id', '=', 1],['paid', '=', 0],])->get(); ?>
/*
    var unpaidTickets = '<?php //echo $unpaidTickets ?>';
    //alert(unpaidTickets.length);
    //console.log(1);
    var ticketTable = document.getElementById("tId");

    for (var t = 0; t < "<?php// echo $unpaidTickets->count() ?>"; t++) {
        var cartRow = ticketTable.insertRow(t);
        for(var u = 0; u < 3; u++){
            if(t == 0){
                var thisHeader = document.createElement("TH");
                var fieldOne = document.createTextNode("TicketID");
                thisHeader.appendChild(fieldOne);

            }
        }
    }
*/
</script>
</body>
</html>