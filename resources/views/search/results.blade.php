@extends('layouts.master')

@section('content')


    <!-- Search Results -->
    <div>


        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:40px;margin-bottom:17px; color: #909090;">Suchergebnisse ({{$eventsetresults->count()}})</h4>

                        @if(!empty($eventsetresults))

                            @foreach($eventsetresults as $eventsetresult)
                                <a href="http://localhost:8000/event/{{$eventsetresult['name']}}">
                                    <div style="background-color:#f1f1f1;padding-top:16px;padding-right:20px;padding-bottom:6px;padding-left:9px;margin-top:16px;margin-left:-6px;">
                                        <h5 style="color:#4f86c3;">{{ $eventsetresult['name'] }}</h5>
                                    <p style="color:#313437;">{{ $eventsetresult['shortDescription'] }}</p>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
    </div>
@endsection
