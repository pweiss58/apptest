@extends('layouts.master')

@section('content')
    <div>
        @if(!empty($eventsetresults))
            @foreach($eventsetresults as $eventsetresult)
                <h1>{{ $eventsetresult['name'] }} </h1>
                <br>
            @endforeach
        @endif
    </div>
@endsection
