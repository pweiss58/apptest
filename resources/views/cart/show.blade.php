<!DOCTYPE html>
<html>
<head>
    <title>Warenkorb</title>
</head>
<body>
<h1>Tickets</h1>
<table id="tId">
    <?php
    $tickets = \App\Seat::all()->where('user_id', 1) ?>
    @foreach ($tickets->chunk(4) as $items)
        <tr class="row">
            @foreach ($items as $product)
                <div class="col-md-3">
                    // html to render a product
                </div> <!-- end col-md-3 -->
            @endforeach
        </tr> <!-- end row -->
    @endforeach

</table>
<script>


/*

<?php // $unpaidTickets =  DB::table('tickets')->where([['user_id', '=', 1],['paid', '=', 0],])->get(); ?>

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