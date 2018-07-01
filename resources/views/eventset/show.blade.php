@extends('layouts.master')


@section ('content')

    <div class="jumbotron flex-row-reverse" style="background-image:url(&quot;/img/kaleo_gross.png&quot;);background-repeat:no-repeat;background-position:center;background-size:cover;">
        <h1 style="color:#eaeaea;"> {{ $eventset->name }} </h1>
        <p style="background-color:rgba(255,255,255,0);color:rgb(255,255,255);">{{ $eventset->description }}&nbsp;</p>
        <p></p>
    </div>
    <div></div>
    <div class="table-responsive" style="color:#444f51;">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Artist</th>
                <th>Ort</th>
                <th>Datum</th>
                <th>Tickets</th>
            </tr>
            </thead>
            <tbody>

            @foreach($events as $event)
                <?php $thisLocation = DB::table('locations')->where([
                    ['id', '=', $event->location_id],
                ])->first(); ?>
            <tr>
                <td><a href="ticket.html" style="color:#444f51;">Kaleo</a></td>
                <td>{{ $thisLocation->city }}, {{ $thisLocation->hallenName }}</td>
                <td>{{ date("d.m.Y H:i", strtotime($event->startDate)) }} Uhr</td>
                <td><a href="ticket.html" style="color:#444f51;">Tickets ab 39,65 Euro</a></td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection