@extends('layouts.master')


@section ('content')

    <div class="simple-slider">
        <div class="swiper-container" style="margin-top:25px;">
            <div class="d-flex swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(&quot;/img/concert-slider_4.jpg&quot;);"></div>
                <div class="swiper-slide" style="background-image:url(&quot;/img/concert-slider_1.jpg&quot;);"></div>
                <div class="swiper-slide" style="background-image:url(&quot;/img/concert-slider_2.jpg&quot;);"></div>
                <div class="swiper-slide" style="background-image:url(&quot;/img/concert-slider_3.jpg&quot;);"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev" style="background-image:url(&quot;/img/pfeil_links.svg&quot;);"></div>
            <div class="swiper-button-next" style="background-image:url(&quot;/img/pfeil_rechts.svg&quot;);"></div>
        </div>
    </div>
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