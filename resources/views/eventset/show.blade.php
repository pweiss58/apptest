@extends('layouts.master')


@section ('content')

    <!-- Eventset -->
    <div class="jumbotron flex-row-reverse"
         style="background-image:url(&quot;/img/{{ $eventset->bannerImage }}&quot;);background-repeat:no-repeat;background-position:center;background-size:cover;">
        <h1 style="color:#eaeaea;"> {{ $eventset->name }} </h1>
        <p style="background-color:rgba(255,255,255,0);color:rgb(255,255,255);">{{ $eventset->longDescription }}
            &nbsp;</p>
        <p></p>
    </div>
    <div></div>
    <div class="container">
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

                    foreach ($thisDepartments as $department) {

                        array_push($departmentPrices, $department->departmentPrice);

                    }

                    $lowestPrice = min($departmentPrices) + $event->basePrice;

                    ?>

                    <tr>
                        <td><a href="{{$eventset->name}}/{{$event->eventNr}}/tickets"
                               style="color:#444f51;"> {{ $eventset->name }} </a></td>
                        <td>{{ $thisLocation->city }}, {{ $thisLocation->hallenName }}</td>
                        <td>{{ date("d.m.Y H:i", strtotime($event->startDate)) }} Uhr</td>
                        <td><a href="{{$eventset->name}}/{{$event->eventNr}}/tickets" style="color:#444f51;">Tickets
                                ab {{ number_format($lowestPrice, 2, ",", ".") }} Euro</a></td>
                    </tr>

                @endforeach

                </tbody>

            </table>
        </div>
    </div>

    <!-- Kundenbewertungen -->
    <div style="width:auto;">
        <div class="intro">
            <h2 class="text-center" style="margin-bottom:23px;margin-top:26px;">Kundenbewertungen</h2>
        </div>
        <div class="container">
            <div class="row justify-content-center" style="width:auto;">

                <!-- Bewertungen -->
                <div class="col-md-8 d-flex flex-column align-items-center"
                     style="padding-left:0px;padding-right:0px;max-width:50%;">

                    @if (count($comments) > 0)

                        @foreach($comments as $comment)

                            <div style="margin-top:15px;">
                                <div class="box"
                                     style="background-color:#f1f1f1;width:340px;padding:0px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px;">
                                    <p class="description"
                                       style="color:#313437;font-family:Roboto, sans-serif;">{{ $comment->text }}</p>
                                </div>
                                <div class="author" style="width:340px;height:24px;padding-left:25px;margin-top:28px;">
                                    <h5 class="name"
                                        style="height:24px;margin-bottom:2px;color:#313437;font-family:Roboto, sans-serif;">
                                        {{ $comment->authorName }}
                                    </h5>
                                </div>
                            </div>

                        @endforeach

                    @else

                        <p style="margin-top:15px;">Für dieses Event gibt es noch keine Bewertungen.</p>

                    @endif

                </div>

                <!-- Formular -->
                <div class="col-md-4 d-flex flex-grow-0"
                     style="margin-top:15px;width:350px;padding-left:0px;padding-right:0px;">
                    <form class="d-flex flex-column align-items-start" method="post"
                          action="/event/{{ $eventset->name }}"
                          style="width:340px;margin-left:10px;">
                        {{ csrf_field() }}
                        <h2 class="text-center">Bewertung abgeben</h2>
                        <div class="form-group{{ $errors->has('authorName') ? ' has-error' : '' }}"><input
                                    class="form-control" type="text" name="authorName" placeholder="Name"
                                    style="font-family:Roboto, sans-serif;color:#313437;"></div>
                        @if ($errors->has('authorName'))
                            <span class="help-block">
                        <strong style="color: black">Bitte einen Anzeigenamen angeben.</strong>
                    </span>
                        @endif
                        <div class="form-group{{ $errors->has('authorEmail') ? ' has-error' : '' }}"><input
                                    class="form-control" type="email" name="authorEmail"
                                    placeholder="Email"
                                    style="color:#313437;font-family:Roboto, sans-serif;">
                        </div>
                        @if ($errors->has('authorEmail'))
                            <span class="help-block">
                        <strong style="color: black">Bitte einge gültige Email-Adresse angeben.</strong>
                    </span>
                        @endif
                        <div
                                class="form-group{{ $errors->has('text') ? ' has-error' : '' }}"><textarea
                                    class="form-control" rows="14" name="text"
                                    placeholder="Deine Bewertung"
                                    style="width:340px;background-color:#f1f1f1;color:#313437;font-family:Roboto, sans-serif;max-width:340px;"></textarea>
                        </div>
                        @if ($errors->has('text'))
                            <span class="help-block">
                        <strong style="color: black">Bitte eine Nachricht angeben.</strong>
                    </span>
                        @endif
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Absenden</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

@endsection