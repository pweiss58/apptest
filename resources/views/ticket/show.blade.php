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

                    allUnavailableSeatsX = "";
                    allUnavailableSeatsY = "";


                    for (var h = 1; h <= departmentNrs.length; h++) {

                        //console.log(receivedData);

                        var thisDepartmentXYString = receivedData.slice(nthIndex(receivedData, '[', h * 2 - 1), nthIndex(receivedData, ']', h * 2) + 1);

                        //console.log(thisDepartmentXYString);

                        var xString = thisDepartmentXYString.slice(0, thisDepartmentXYString.search("]") + 1);

                        var yString = thisDepartmentXYString.slice(thisDepartmentXYString.search("]") + 1, nthIndex(thisDepartmentXYString, ']', 2) + 1);

                        //console.log(xString);
                        //console.log(yString);

                        //thisDepartmentsUnavailableSeatsX = JSON.parse(xString);
                        //thisDepartmentsUnavailableSeatsY = JSON.parse(yString);

                        //console.log(Object.values(allUnavailableSeatsX));
                        //console.log(Object.values(allUnavailableSeatsY));

                        allUnavailableSeatsX = Object.values(allUnavailableSeatsX);
                        allUnavailableSeatsY = Object.values(allUnavailableSeatsY);


                        //console.log("---------------------");

                        allUnavailableSeatsX.push(JSON.parse(xString));
                        allUnavailableSeatsY.push(JSON.parse(yString));

                        //console.log(allUnavailableSeatsX);
                        //console.log(allUnavailableSeatsY);
                    }
                }
                else {
                    allUnavailableSeatsX = "";
                    allUnavailableSeatsY = "";
                }

            });
        }, 5 * 1000);   //5 sekunden
    });
</script>


@extends('layouts.master')


@section ('content')

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
                                            <select name="seatsbp{{ $department->departmentNr }}" style="margin-top:6px;">
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
                    <div class="table-responsive" style="color:#444f51;">

                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" role="tablist">

                                    @foreach($departments as $department)
                                        <li class="nav-item"><a class="nav-link @if($loop->index ==0) active @endif"
                                                                href="#item-2-{{ $department->departmentNr}}"
                                                                id="item-2-{{ $department->departmentNr}}-tab"
                                                                data-toggle="tab"
                                                                role="tab"
                                                                onclick="buildSeatTable({{ $department->departmentNr }})"
                                                                aria-controls="item-2-{{ $department->departmentNr}}"
                                                                aria-selected="@if($loop->index == 0) true @else false @endif">Kategorie {{ $department->departmentNr}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="card-body" style="margin-top:0px;">
                                <div id="nav-tabContent" class="tab-content">

                                    @foreach($departments as $department)

                                        <div id="item-2-{{ $department->departmentNr}}"
                                             class="tab-pane fade @if($loop->index == 0) show active @endif"
                                             role="tabpanel"
                                             aria-labelledby="item-2-{{ $department->departmentNr}}-tab">

                                            <div class="outer">
                                                <div class="">
                                                    <h1 style="font-size:20px;">Bitte bis zu 5 Sitzplätze
                                                        auswählen.</h1>
                                                </div>

                                                <div class="" id="seatChooserDiv">
                                                    <form method="post" action="/cart/{{ $event->id }}"
                                                          id="seatChooser">
                                                        {{ csrf_field() }}
                                                        <table id="{{ $department->departmentNr }}">

                                                        </table>
                                                        <input type="submit" class="btn btn-primary"
                                                               name="{{ $department->departmentNr }}"
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
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        <?php

        $allUnavailableSeatsX = array();
        $allUnavailableSeatsY = array();

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
            }

            $thisDepartmentsUnavailableSeatsX = json_encode($thisDepartmentsUnavailableSeatsX);
            //echo "var thisDepartmentsUnavailableSeatsX = " . $thisDepartmentsUnavailableSeatsX . ";\n";
            array_push($allUnavailableSeatsX, $thisDepartmentsUnavailableSeatsX);

            $thisDepartmentsUnavailableSeatsY = json_encode($thisDepartmentsUnavailableSeatsY);
            //echo "var thisDepartmentsUnavailableSeatsY = " . $thisDepartmentsUnavailableSeatsY . ";\n";
            array_push($allUnavailableSeatsY, $thisDepartmentsUnavailableSeatsY);
        }

        $allUnavailableSeatsX = json_encode($allUnavailableSeatsX);
        echo "var allUnavailableSeatsX = " . $allUnavailableSeatsX . ";\n";

        $allUnavailableSeatsY = json_encode($allUnavailableSeatsY);
        echo "var allUnavailableSeatsY = " . $allUnavailableSeatsY . ";\n";


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

        var currentDepartment = 1;

        setInterval(function () {

                sessionStorage.clear();

                    @foreach($departments as $department)

                var checkboxArray = [];

                var checkedCheckboxes = document.querySelectorAll('input[type=checkbox][name="seats{{ $department->departmentNr }}[]"]:checked');

                for (var g = 0; g < checkedCheckboxes.length; g++) {

                    checkboxArray.push(checkedCheckboxes[g].value);
                }

                //console.log(checkboxArray.toString());

                sessionStorage.setItem("pickedSeats{{ $department->departmentNr }}", checkboxArray.toString());

                    @endforeach


                    buildSeatTable(currentDepartment);


                    @foreach($departments as $department)

                var thisPickedSeatIDsString = sessionStorage.getItem("pickedSeats{{ $department->departmentNr }}");

                var thisAllSeatsArray = document.getElementsByName("seats{{ $department->departmentNr }}[]");

                var thisAllSeatIDsArray = [];

                for (var h = 0; h < thisAllSeatsArray.length; h++) {

                    thisAllSeatIDsArray.push(thisAllSeatsArray[h].id);
                }

                //console.log(allSeatIDsArray);

                //var allSeatIDsString = thisAllSeatIDsArray.toString();

                //console.log(allSeatIDsString);

                //console.log(pickedSeatIDsString);


                //var thisDepartmentSeatCount = "{{ $department->rowCount }}" * "{{ $department-> columnCount }}";


                /*if (nthIndex(thisPickedSeatIDsString, 'A1', {{ $department->departmentNr }} +1) < 0) {

                    var thisPickedSeatIDsString = thisPickedSeatIDsString.slice(nthIndex(thisPickedSeatIDsString, 'A1', {{ $department->departmentNr }}));
                    var thisAllSeatIDsString = allSeatIDsString.slice(nthIndex(allSeatIDsString, 'A1', {{ $department->departmentNr }} ));

                }
                else {

                    //console.log(nthIndex(pickedSeatIDsString, 'A1', {{ $department->departmentNr }} +1));
                    var thisPickedSeatIDsString = thisPickedSeatIDsString.slice(nthIndex(thisPickedSeatIDsString, 'A1', {{ $department->departmentNr }} ), nthIndex(thisPickedSeatIDsString, 'A1', {{ $department->departmentNr }} +1));
                    var thisAllSeatIDsString = allSeatIDsString.slice(nthIndex(allSeatIDsString, 'A1', {{ $department->departmentNr }} ), nthIndex(allSeatIDsString, 'A1', {{ $department->departmentNr }} +1) - 1);

                }*/


                //console.log(thisPickedSeatIDsString);
                //console.log(thisAllSeatIDsString);


                if (thisPickedSeatIDsString != null) {

                    var thisPickedSeatIDsArray = thisPickedSeatIDsString.split(",");
                    //var thisAllSeatIDsArray = thisAllSeatIDsString.split(",");

                    //console.log(thisPickedSeatIDsArray);
                    //console.log(thisAllSeatIDsArray[0]);

                    for (var i = 0; i < thisAllSeatsArray.length; i++) {

                        for (var j = 0; j < thisPickedSeatIDsArray.length; j++) {

                            if (thisPickedSeatIDsArray[j] == thisAllSeatsArray[i].id && !thisAllSeatsArray[i].disabled) {

                                thisAllSeatsArray[i].checked = true;
                            }
                        }
                    }
                }

                    @endforeach

                    sessionStorage.clear();

            },
            6000
        )
        ;   //6 sekunden

        function buildSeatTable(departmentNr) {

            allUnavailableSeatsX = Object.values(allUnavailableSeatsX);
            allUnavailableSeatsY = Object.values(allUnavailableSeatsY);

            currentDepartment = departmentNr;

            for (var h = 0; h < departmentNrs.length; h++) {

                var seatTable = document.getElementById(departmentNrs[h]);

                if (departmentNr == departmentNrs[h]) {

                    seatTable.innerHTML = "";

                    for (var i = 0; i < departmentRowCounts[h]; i++) {
                        var thisRow = seatTable.insertRow(i);
                        thisRow.setAttribute("class", "seats");

                        for (var j = 0; j < departmentColumnCounts[h]; j++) {

                            var seatCheckbox = document.createElement("INPUT");
                            var seatLabel = document.createElement("LABEL");
                            seatLabel.setAttribute("class", "foldsTest" + (h + 1) + "");
                            var rowLetter = String.fromCharCode(65 + i);
                            var seatID = (rowLetter + (+j + 1));

                            seatCheckbox.setAttribute("type", "checkbox");
                            seatCheckbox.setAttribute("id", seatID);
                            seatCheckbox.setAttribute("name", "seats" + (h + 1) + "[]");
                            seatCheckbox.setAttribute("value", seatID);
                            seatCheckbox.setAttribute("class", "foldTest" + (h + 1) + "");

                            var x = i + 1;
                            var y = j + 1;

                            //allUnavailableSeatsX[h] = new Array();
                            //allUnavailableSeatsY[h] = new Array();

                            //console.log(allUnavailableSeatsX.length);

                            if (allUnavailableSeatsX.length > 0) {

                                for (var k = 0; k < allUnavailableSeatsX.length; k++) {

                                    if (allUnavailableSeatsX[h][k] == x && allUnavailableSeatsY[h][k] == y) {

                                        seatCheckbox.setAttribute("disabled", "disabled");
                                    }
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
                else {

                    seatTable.innerHTML = "";
                }
            }
        }

        function nthIndex(str, pat, n) {

            var l = str.length, i = -1;
            while (n-- && i++ < l) {

                i = str.indexOf(pat, i);
                if (i < 0) break;
            }
            return i;
        }

        function showAndHide(departmentNr) {

            /*var checkboxes = [];
            var labels = [];

            @foreach($departments as $department)

            if (departmentNr == "{{ $department->departmentNr }}") {

                //document.getElementById("item-2-{{ $department->departmentNr }}").style.height = "";
                checkboxes = document.getElementsByClassName("foldTest{{ $department->departmentNr }}");

                for (var i = 0; i < checkboxes.length; i++){

                    checkboxes[i].setAttribute("style", "height: 30; width: 30;");
                    labels[i].setAttribute("style", "height: 30; width: 30;");
                    console.log("changed back");
                }
            }
            else {

                //document.getElementById("item-2-{{ $department->departmentNr }}").style.height = "0";
                checkboxes = document.getElementsByClassName("foldTest{{ $department->departmentNr }}");
                labels = document.getElementsByClassName("foldsTest{{ $department->departmentNr }}");

                for (var j = 0; j < checkboxes.length; j++){

                    checkboxes[j].setAttribute("style", "height: 0; width: 0;");
                    labels[j].setAttribute("style", "height: 0; width: 0;");
                    console.log("changed down");
                }
            }

            @endforeach*/
        }

        buildSeatTable(1);

    </script>

@endsection