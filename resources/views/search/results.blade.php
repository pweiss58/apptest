@extends('layouts.master')

@section('content')


    <!-- Search Results -->
    <div>


                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="margin-top:40px;margin-bottom:17px;">Suchergebnisse ({{$eventsetresults->count()}})</h4>
                                @if(!empty($eventsetresults))
                                    @foreach($eventsetresults as $eventsetresult)
                                     <div style="background-color:#f1f1f1;padding-top:16px;padding-right:20px;padding-bottom:6px;padding-left:9px;margin-top:16px;margin-left:-6px;">
                                     <h5 style="color:#313437;">{{ $eventsetresult['name'] }}</h5>
                                        <p style="color:#313437;">{{ $eventsetresult['shortDescription'] }}</p>
                                        <a class="d-table-cell justify-content-center learn-more" href="/event/{{$eventsetresult['name']}}" style="background-color:rgba(255,255,255,0);">http://localhost:8000/event/{{$eventsetresult['name']}}
                                            »</a>
                                         @endforeach
                                         @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <br><br><br><br><br><br>
    </div>
@endsection
