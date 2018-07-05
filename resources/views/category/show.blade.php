@extends('layouts.master')


@section ('content')

    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">{{ $category->name }}</h2>
                <p class="text-center">{{ $category->description }}</p>
            </div>

            @foreach ($eventsets as $eventset)

                @if($loop->iteration % 3 == 1)
                    <div class="row articles">
                        @endif

                        <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="{{ $eventset->teaserImage }}"></a>
                            <h3 class="name">{{ $eventset->name }}</h3>
                            <p class="description">{{ $eventset->shortDescription }}</p><a
                                    href="/event/{{ $eventset->name }}" class="action"><i
                                        class="fa fa-arrow-circle-right"></i></a></div>

                        @if($loop->iteration % 3 == 0 || $loop->last)
                    </div>
                @endif

            @endforeach

        </div>
    </div>

@endsection

