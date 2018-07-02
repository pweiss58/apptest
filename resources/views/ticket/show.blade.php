<?php
if (isset($_GET['get_database_changes'])) {

    $unavailableSeatsIDs = DB::table('tickets')->where([
        ['available', '=', false],
        ['event_id', '=', $event->id],
    ])->pluck('seat_id');

    $unavailableSeatsIDsCount = DB::table('tickets')->where([
        ['available', '=', false],
        ['event_id', '=', $event->id],
    ])->count();

    foreach ($departments as $department) {

        $thisDepartmentsUnavailableSeatsX = array();
        $thisDepartmentsUnavailableSeatsY = array();


        if ($unavailableSeatsIDsCount > 0) {

            $i = 0;

            foreach ($unavailableSeatsIDs as $seatID) {

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
            echo $thisDepartmentsUnavailableSeatsX;

            $thisDepartmentsUnavailableSeatsY = json_encode($thisDepartmentsUnavailableSeatsY);
            echo $thisDepartmentsUnavailableSeatsY;
        }
    }

    exit;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
   /* var allUnavailableSeatsXs = [[]];
    var allUnavailableSeatsYs = [[]];*/

    $(function () {

        setInterval(function () {

            $.get('<?php echo $_SERVER['REQUEST_URI']; ?>?get_database_changes', function (receivedData) {

                if (receivedData != "") {


                    for (var h = 1; h <= departmentNrs.length; h++) {

                        function nthIndex(str, pat, n) {
                            var l = str.length, i = -1;
                            while (n-- && i++ < l) {
                                i = str.indexOf(pat, i);
                                if (i < 0) break;
                            }
                            return i;
                        }

                        var thisDepartmentXYString = receivedData.slice(nthIndex(receivedData, '[', h * 2 - 1), nthIndex(receivedData, ']', h * 2) + 1);

                        console.log(thisDepartmentXYString);

                        var xString = thisDepartmentXYString.slice(0, thisDepartmentXYString.search("]") + 1);

                        var yString = thisDepartmentXYString.slice(thisDepartmentXYString.search("]") + 1, nthIndex(thisDepartmentXYString, ']', 2) + 1);

                        //console.log(receivedData);
                        console.log(xString);
                        console.log(yString);

                        //thisDepartmentsUnavailableSeatsX = JSON.parse(xString);
                        //thisDepartmentsUnavailableSeatsY = JSON.parse(yString);

                        allUnavailableSeatsXs.push(JSON.parse(xString));
                        allUnavailableSeatsYs.push(JSON.parse(yString));

                        console.log(allUnavailableSeatsXs);
                        console.log(allUnavailableSeatsYs);
                    }
                }
                else {
                    allUnavailableSeatsXs = "";
                    allUnavailableSeatsYs = "";
                }

            });
        }, 5 * 1000);   //5 sekunden
    });
</script>


@extends('layouts.master')


@section ('content')

    <div class="jumbotron flex-row-reverse"
         style="background-image:url(&quot;/img/tickets.png&quot;);background-repeat:no-repeat;background-position:center;background-size:cover;">
        <h1 style="color:#eaeaea;">Tickets</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab"
                                        role="tab" aria-controls="item-1-1" aria-selected="true">Bestplatzbuchung</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab"
                                        aria-controls="item-1-2" aria-selected="false">Saalplanbuchung</a></li>
            </ul>
        </div>
        <div class="card-body" style="margin-top:0px;">
            <div id="nav-tabContent" class="tab-content">

                <!--Bestplatzbuchung-->
                <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                    <div class="table-responsive" style="color:#444f51;">

                        <form method="POST" action="/cart/{{ $event->id }}">
                            {{ csrf_field() }}

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Kategorie</th>
                                    <th>Beschreibung</th>
                                    <th>Preis</th>
                                    <th>Anzahl</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($departments as $department)

                                    <tr>
                                        <td style="padding-top:18px;">{{ $department->departmentNr }}</td>
                                        <td style="padding-top:18px;">{{ $department->description }}</td>
                                        <td style="padding-top:18px;">00,00 EURO</td>
                                        <td>
                                            <select name="seats{{ $department->departmentNr }}" style="margin-top:6px;">
                                                <option value="0" selected>0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button name="{{ $department->departmentNr }}" class="btn btn-primary"
                                                    type="submit">In den Warenkorb
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>


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
                        -webkit-box-shadow: inset 0px 0px 0px 1px #000;
                        -moz-box-shadow: inset 0px 0px 0px 1px #000;
                        box-shadow: inset 0px 0px 0px 1px #000;
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

                    input[type=submit] {
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

                <!--Saalplanbuchung-->
                <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">

                    @foreach($departments as $department)

                        <h1>Department {{ $department->departmentNr }}</h1>


                        <div class="outer">
                            <div class="">
                                <h1>Bitte bis zu 5 Sitzplätze auswählen.</h1>
                            </div>

                            <div class="" id="seatChooserDiv">
                                <form method="post" action="/cart/{{ $event->id }}" id="seatChooser">
                                    {{ csrf_field() }}
                                    <table id="{{ $department->departmentNr }}">

                                    </table>
                                    <input type="submit" class="btn btn-primary" name="{{ $department->departmentNr }}"
                                           value="Auswahl bestätigen">
                                </form>
                            </div>

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">

                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach

                                </div>
                            @endif

                        </div>

                    @endforeach

                </div>

            </div>
        </div>
    </div>


    <script>

        <?php

        $unavailableSeatsIDs = DB::table('tickets')->where([
            ['available', '=', false],
            ['event_id', '=', $event->id],
        ])->pluck('seat_id');

        foreach ($departments as $department) {

            $thisDepartmentsUnavailableSeatsX = "";
            $thisDepartmentsUnavailableSeatsY = "";


            if ($unavailableSeatsIDs != null) {

                $i = 0;

                foreach ($unavailableSeatsIDs as $seatID) {

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
            }

            $thisDepartmentsUnavailableSeatsX = json_encode($thisDepartmentsUnavailableSeatsX);
            echo "var thisDepartmentsUnavailableSeatsX = " . $thisDepartmentsUnavailableSeatsX . ";\n";

            $thisDepartmentsUnavailableSeatsY = json_encode($thisDepartmentsUnavailableSeatsY);
            echo "var thisDepartmentsUnavailableSeatsY = " . $thisDepartmentsUnavailableSeatsY . ";\n";
        }




        $departmentNrs = array();
        $departmentRowCounts = array();
        $departmentColumnCounts = array();

        foreach ($departments as $department) {

            array_push($departmentNrs, $department->departmentNr);
            array_push($departmentRowCounts, $department->rowCount);
            array_push($departmentColumnCounts, $department->columnCount);
        }


        $departmentNrsJS = json_encode($departmentNrs);
        $departmentRowCountsJS = json_encode($departmentRowCounts);
        $departmentColumnCountsJS = json_encode($departmentColumnCounts);

        echo "var departmentNrs = " . $departmentNrsJS . ";\n";
        echo "var departmentRowCounts = " . $departmentRowCountsJS . ";\n";
        echo "var departmentColumnCounts = " . $departmentColumnCountsJS . ";\n";



        ?>

        setInterval(function () {

            sessionStorage.clear();

            var array = [];
            var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');

            for (var i = 0; i < checkboxes.length; i++) {
                array.push(checkboxes[i].value);
            }

            sessionStorage.setItem("pickedSeats", array.toString());

            buildSeatTable();

            var pickedSeatsString = sessionStorage.getItem("pickedSeats");

            sessionStorage.clear();

            if (pickedSeatsString != null) {

                var pickedSeatsArray = pickedSeatsString.split(",");

                var allSeatsArray = document.getElementsByName("seats[]");

                for (var i = 0; i < allSeatsArray.length; i++) {

                    for (var j = 0; j < pickedSeatsArray.length; j++) {

                        if (pickedSeatsArray[j] == allSeatsArray[i].id && !allSeatsArray[i].disabled) {

                            allSeatsArray[i].checked = true;
                        }
                    }
                }
            }

        }, 10000);   //10 sekunden

        function buildSeatTable() {

            for (var h = 0; h < departmentNrs.length; h++) {


                var seatTable = document.getElementById(departmentNrs[h]);

                seatTable.innerHTML = "";

                for (var i = 0; i < departmentRowCounts[h]; i++) {
                    var thisRow = seatTable.insertRow(i);
                    thisRow.setAttribute("class", "seats");

                    for (var j = 0; j < departmentColumnCounts[h]; j++) {

                        var seatCheckbox = document.createElement("INPUT");
                        var seatLabel = document.createElement("LABEL");
                        var rowLetter = String.fromCharCode(65 + i);
                        var seatID = (rowLetter + (+j + 1));

                        seatCheckbox.setAttribute("type", "checkbox");
                        seatCheckbox.setAttribute("id", seatID);
                        seatCheckbox.setAttribute("name", "seats[]");
                        seatCheckbox.setAttribute("value", seatID);

                        var x = i + 1;
                        var y = j + 1;

                        //allUnavailableSeatsXs[h] = new Array();
                        //allUnavailableSeatsYs[h] = new Array();

                        console.log(allUnavailableSeatsXs);

                        for (var k = 0; k < allUnavailableSeatsXs[h][0].length; k++) {

                            if (allUnavailableSeatsXs[h][k] == x && allUnavailableSeatsYs[h][k] == y) {

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
            }
        }

    </script>

@endsection