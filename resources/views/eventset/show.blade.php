@extends('layouts.master')


@section ('content')

    <div class="jumbotron flex-row-reverse" style="background-image:url(&quot;{{ $eventset->bannerImage }}&quot;);background-repeat:no-repeat;background-position:center;background-size:cover;">
        <h1 style="color:#eaeaea;"> {{ $eventset->name }} </h1>
        <p style="background-color:rgba(255,255,255,0);color:rgb(255,255,255);">{{ $eventset->longDescription }}&nbsp;</p>
        <p></p>
    </div>
    <div></div>
    <div class="table-responsive" style="color:#444f51;">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Event</th>
                <th>Ort</th>
                <th>Datum</th>
                <th>Tickets</th>
            </tr>
            </thead>
            <tbody>

            @foreach($events as $event)

                <?php $thisLocation = DB::table('locations')->where([
                    ['id', '=', $event->location_id],
                ])->first();

                $thisDepartments = DB::table('departments')->where([
                    ['location_id', '=', $thisLocation->id],
                ])->get();

                $departmentPrices = array();

                foreach($thisDepartments as $department){

                    array_push($departmentPrices, $department->departmentPrice);

                }

                $lowestPrice = min($departmentPrices) + $event->basePrice;

                ?>

            <tr>
                <td><a href="{{$eventset->name}}/{{$event->eventNr}}/tickets" style="color:#444f51;"> {{ $eventset->name }} </a></td>
                <td>{{ $thisLocation->city }}, {{ $thisLocation->hallenName }}</td>
                <td>{{ date("d.m.Y H:i", strtotime($event->startDate)) }} Uhr</td>
                <td><a href="{{$eventset->name}}/{{$event->eventNr}}/tickets" style="color:#444f51;">Tickets ab {{ number_format($lowestPrice, 2, ",", ".") }} Euro</a></td>
            </tr>

            @endforeach

            </tbody>
        </table>
    </div>

@endsection