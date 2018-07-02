@extends('layouts.master')


@section ('content')

    <div class="jumbotron flex-row-reverse" style="background-image:url(&quot;/img/tickets.png&quot;);background-repeat:no-repeat;background-position:center;background-size:cover;">
        <h1 style="color:#eaeaea;">Tickets</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">Bestplatzbuchung</a></li>
                <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false">Saalplanbuchung</a></li>
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
                                    <td><button name="{{ $department->departmentNr }}" class="btn btn-primary" type="submit">In den Warenkorb</button></td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>

                <!--Saalplanbuchung-->
                <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">

                </div>

            </div>
        </div>
    </div>

@endsection