<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Department {{ $department->departmentNr }}</title>
    <style class="">
        *, *:before, *:after {
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
        }

        .outer {
            /*margin: 20px auto;*/
            max-width: 300px;
        }

        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .seats {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
        }

        .seat {
            display: flex;
            flex: 0 0 14.3%;
            padding: 4px;
            position: relative;
        }
        .seat:nth-child(3) {
            /*
              margin-right: 14.285%;
              */
        }
        .seat input[type=checkbox] {
            position: absolute;
            opacity: 0;
        }
        .seat input[type=checkbox]:checked + label {
            background: yellow;
            /*border: 1px solid black;*/
            -webkit-box-shadow:inset 0px 0px 0px 1px #000;
            -moz-box-shadow:inset 0px 0px 0px 1px #000;
            box-shadow:inset 0px 0px 0px 1px #000;
        }
        .seat input[type=checkbox]:disabled + label {
            background: red;
            /*
          -webkit-box-shadow:inset 0px 0px 0px 1px #000;
          -moz-box-shadow:inset 0px 0px 0px 1px #000;
          box-shadow:inset 0px 0px 0px 1px #000;
            */
        }
        .seat input[type=checkbox]:disabled + label:after {
            text-indent: 0;
            position: absolute;
            top: 4px;
            left: 50%;
        }
        .seat input[type=checkbox]:disabled + label:hover {
            box-shadow: none;
            cursor: not-allowed;
        }

        input[type=submit]{
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .seat label {
            display: block;
            position: relative;
            width: 100%;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            line-height: 1.5rem;
            padding: 4px 0;
            background: lightgreen;
            border-radius: 5px;
            animation-duration: 300ms;
            animation-fill-mode: both;
        }

        .seat label:hover {
            cursor: pointer;
            box-shadow: 0 0 0px 2px #7B2AFF;
        }

    </style>
</head>
<body>
<h1>Department {{ $department->departmentNr }}</h1>
<ul>
    <li>Amount of Rows: {{ $department->rowCount }}</li>
    <li>Amount of Columns: {{ $department->columnCount }}</li>
    <li>Location ID: {{ $department->location_id }}</li>
</ul>

<div class="outer">
    <div class="">
        <h1>Please select a seat</h1>
    </div>

    <div class="">
        <form method="post" action="/cart/{{ $event->id }}/{{ $department->id }}">
            {{ csrf_field() }}
            <table id="seattable">

            </table>
            <input type="submit" name="formSubmit" value="Auswahl bestätigen">
        </form>
    </div>

    <div class="">

    </div>
</div>

<script>

    <?php
        $unavailableSeatsIDs = DB::table('tickets')->where([
           ['available', '=', false],
        ])->pluck('seat_id');

        $thisDepartmentsUnavailableSeatsX = array();
        $i = 0;

        foreach ($unavailableSeatsIDs as $seatID){

            $thisDepartmentsUnavailableSeatsX[$i] = DB::table('seats')->where([
                ['id', '=', $seatID],
                ['department_id', '=', $department->id],
            ])->value('seatX');

            $thisDepartmentsUnavailableSeatsY[$i] = DB::table('seats')->where([
                ['id', '=', $seatID],
                ['department_id', '=', $department->id],
            ])->value('seatY');

            $i++;
        }

    $thisDepartmentsUnavailableSeatsX = json_encode($thisDepartmentsUnavailableSeatsX);
        echo "var thisDepartmentsUnavailableSeatsX = ". $thisDepartmentsUnavailableSeatsX . ";\n";

    $thisDepartmentsUnavailableSeatsY = json_encode($thisDepartmentsUnavailableSeatsY);
        echo "var thisDepartmentsUnavailableSeatsY = ". $thisDepartmentsUnavailableSeatsY . ";\n";
    ?>


    var seatTable = document.getElementById("seattable");

    for (var i = 0; i < "<?php echo $department->rowCount; ?>"; i++){
        var thisRow = seatTable.insertRow(i);
        thisRow.setAttribute("class", "seats");

        for (var j = 0; j < "<?php echo $department->columnCount; ?>"; j++){

            var seatCheckbox = document.createElement("INPUT");
            var seatLabel = document.createElement("LABEL");
            var rowLetter = String.fromCharCode(65 + i);
            var seatID = (rowLetter + (+j + 1));

            seatCheckbox.setAttribute("type", "checkbox");
            seatCheckbox.setAttribute("id", seatID);
            seatCheckbox.setAttribute("name", "seats[]");
            seatCheckbox.setAttribute("value", seatID);

            var x = i+1;
            var y = j+1;

            for (var k = 0; k < thisDepartmentsUnavailableSeatsX.length; k++){

                if (thisDepartmentsUnavailableSeatsX[k] == x && thisDepartmentsUnavailableSeatsY[k] == y){

                    seatCheckbox.setAttribute("disabled", "disabled");
                }
            }

            seatLabel.setAttribute("for", seatID);
            seatLabel.innerHTML = seatID;

            var thisCell = thisRow.insertCell(j);
            thisCell.setAttribute("class", "seat");
            thisCell.appendChild(seatCheckbox);
            thisCell.appendChild(seatLabel);
        }
    }
</script>


<?php
/*$alphabet = range('A', 'Z');

if(isset($_POST['seats'])){
    $aSeat = $_POST['seats'];

    if(empty($aSeat)){
        echo("Kein Sitzplatz ausgewählt!");
    }
    else{
        $seatCount = count($aSeat);
        echo("$seatCount Sitzplätze ausgewählt: ");
        foreach($aSeat as $seatNr){
            echo $seatNr.", ";
            $seatX = substr($seatNr, 0, 1);
            $seatX = array_search($seatX, $alphabet) + 1;
            $seatY = substr($seatNr, 1);
            DB::update('update tickets set available = false where department_id = ? and seatX = ? and seatY = ?', [$department->id, $seatX, $seatY]);
        }
    }
}

echo "";*/
?>

</body>
</html>