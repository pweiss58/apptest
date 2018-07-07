@extends('layouts.master')


@section ('content')

    <!-- Carousel -->
    <div class="carousel slide" data-ride="carousel" data-interval="5000" id="carousel-1" style="height:auto;margin-bottom:15px;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active"><img class="img-fluid w-100 d-block" src="/img/index1.png" alt="Slide Image" style="width:100%;height:auto;"></div>
            <div class="carousel-item"><img class="img-fluid w-100 d-block" src="/img/index2.png" alt="Slide Image"></div>
            <div class="carousel-item"><img class="img-fluid w-100 d-block" src="/img/index3.png" alt="Slide Image"></div>
            <div class="carousel-item"><img class="img-fluid w-100 d-block" src="/img/index4.png" alt="Slide Image"></div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon" style="background-image:url(&quot;/img/pfeil_links.svg&quot;);"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next"
                                                                                                                                                                                                                                                                   href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon" style="background-image:url(&quot;/img/pfeil_rechts.svg&quot;);"></span><span class="sr-only">Next</span></a></div>
        <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
            <li data-target="#carousel-1" data-slide-to="3"></li>
        </ol>
    </div>


    <!-- Events -->
    <div class="d-flex features-boxed">
        <div class="container d-flex flex-column justify-content-center align-items-center align-content-center align-self-center"
             style="background-color:#ffffff;">
            <div class="d-flex justify-content-center align-items-center align-content-center align-self-center m-auto intro">
                <h2 class="text-center" style="margin-bottom:25pxpx;padding-top:0px;margin-top:25px;">Tipps</h2>
            </div>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">

                        @foreach($categories as $category)

                            <li class="nav-item"><a class="nav-link @if($loop->first) active @endif" href="#item-1-{{ $category->id + 1}}" id="item-1-{{ $category->id + 1}}-tab"
                                                    data-toggle="tab" role="tab" aria-controls="item-1-{{ $category->id + 1}}"
                                                    @if($loop->first) aria-selected="true" @endif>{{ $category->name }}</a></li>

                        @endforeach

                    </ul>
                </div>
                <div class="card-body" style="margin-top:0px; min-width:1108px;">
                    <div id="nav-tabContent" class="tab-content">

                        @foreach ($categories as $category)

                            <div id="item-1-{{ $category->id + 1}}" class="tab-pane fade @if($loop->first) show active @endif" role="tabpanel"
                                 aria-labelledby="item-1-{{ $category->id + 1}}-tab">
                                <h4 style="margin-bottom:20px;">Die besten {{ $category->name }} Konzerte</h4>
                                <div class="row d-flex justify-content-center features"
                                     style="padding-top:0px;margin-top:0px;margin-bottom:0px;padding-bottom:5px;margin-right:0px;margin-left:0px;">

                                    <?php

                                    $eventsets = DB::table('eventsets')->where([
                                        ['category_id', '=', $category->id],
                                    ])->get();

                                    ?>

                                    @foreach ($eventsets as $eventset)

                                        <div class="col-sm-6 col-md-5 col-lg-4 item"
                                             style="width:319px;margin-bottom:20px;">
                                            <div class="d-table-cell box"
                                                 style="background-image:url(&quot;{{ $eventset->teaserImage }}&quot;);height:343px;width:289px;margin-left:0px;background-repeat:no-repeat;background-position:center;"></div>
                                            <p class="text-center d-table-row description"
                                               style="background-color:#ffffff;padding:0px;height:66px;width:289px;">{{ $eventset->shortDescription }}</p>
                                            <a
                                                    class="d-table-cell justify-content-center learn-more"
                                                    href="/event/{{ $eventset->name }}"
                                                    style="background-color:rgba(255,255,255,0);padding:10px;width:289px;">Tickets
                                                »</a></div>

                                    @endforeach

                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection