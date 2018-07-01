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
        <div class="container d-flex flex-column justify-content-center align-items-center align-content-center align-self-center" style="background-color:#ffffff;">
            <div class="d-flex justify-content-center align-items-center align-content-center align-self-center m-auto intro">
                <h2 class="text-center" style="margin-bottom:25pxpx;padding-top:0px;margin-top:25px;">Tipps</h2>
            </div>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">Rock</a></li>
                        <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false">Pop</a></li>
                        <li class="nav-item"><a class="nav-link" href="#item-1-3" id="item-1-3-tab" data-toggle="tab" role="tab" aria-controls="item-1-3" aria-selected="false">Klassik</a></li>
                    </ul>
                </div>
                <div class="card-body" style="margin-top:0px;">
                    <div id="nav-tabContent" class="tab-content">
                        <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                            <h4 style="margin-bottom:20px;">Die besten Rock Konzerte</h4>
                            <div class="row d-flex justify-content-center features" style="padding-top:0px;margin-top:0px;margin-bottom:0px;padding-bottom:5px;margin-right:0px;margin-left:0px;">
                                <div class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;">
                                    <div class="d-table-cell box" style="background-image:url(&quot;/img/kaleo.png&quot;);height:343px;width:289px;margin-left:0px;background-repeat:no-repeat;background-position:center;"></div>
                                    <p class="text-center d-table-row description" style="background-color:#ffffff;padding:0px;height:66px;width:289px;">Mit ihren Singles „Way Down We Go“ und „All The Pretty Girls“ platzierten KALEO ihren neuartigen Alternative-Rocksound über Wochen in den internationalen Chart-Spitzen.</p><a class="d-table-cell justify-content-center learn-more"
                                        href="kaleo_band.html" style="background-color:rgba(255,255,255,0);padding:10px;width:289px;">Tickets »</a></div>
                                <div class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;height:503px;">
                                    <div class="d-table-cell box" style="background-image:url(&quot;/img/patti_smith.png&quot;);height:343px;width:289px;margin-left:0px;background-repeat:no-repeat;background-position:center;"></div>
                                    <p class="d-table-row description" style="background-color:#ffffff;width:289px;">Die seltenen und durchweg atemberaubenden Konzerte von Patti Smith and her band stellen rare Highlights im Konzertgeschehen dar.<br></p><a class="d-table-cell justify-content-center learn-more" href="pattismith_band.html"
                                        style="background-color:rgba(255,255,255,0);width:289px;height:44px;padding:10px;">Tickets »</a></div>
                                <div class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;height:503px;">
                                    <div class="d-table-cell box" style="background-image:url(&quot;/img/eric_clapton.png&quot;);height:343px;width:289px;margin-left:0;background-repeat:no-repeat;background-position:center;"></div>
                                    <p class="d-table-row description" style="background-color:#ffffff;width:289px;">Die einzigen Headline-Shows in Europa: Musiklegende Eric Clapton kommt nach vier Jahren endlich wieder nach Deutschland!</p><a class="d-table-cell justify-content-center learn-more" href="ericclapton_band.html" style="background-color:rgba(255,255,255,0);width:289px;height:44px;padding:10px;">Tickets »</a></div>
                                <div
                                    class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;padding-right:30px;padding-left:30px;">
                                    <div class="d-table-cell box" style="background-image:url(&quot;/img/arctic_monkeys.png&quot;);height:343px;margin:0px;width:289px;margin-left:0px;margin-bottom:30px;background-repeat:no-repeat;background-position:center;"></div>
                                    <p class="d-table-row description" style="background-color:rgba(255,255,255,0);height:66px;width:289px;">Die Arctic Monkeys kommen im Frühsommer 2018 für zwei Live-Shows nach Deutschland!</p><a class="d-table-cell justify-content-center learn-more" href="arctic_monkeys_band.html" style="background-color:rgba(255,255,255,0);width:289px;height:44px;padding:10px;">Tickets »</a></div>
                            <div
                                class="col-sm-6 col-md-5 col-lg-4 item" style="height:503px;width:319px;margin-bottom:20px;">
                                <div class="d-table-cell box" style="background-image:url(&quot;/img/kaiser_chiefs.png&quot;);height:343px;margin:0px;width:289px;margin-left:0px;margin-bottom:30px;background-repeat:no-repeat;background-position:center;"></div>
                                <p class="d-table-row description" style="width:289px;">Der Musikstil der Kaiser Chiefs bewegt sich zwischen Indie-Rock und <br>Garage-Rock und ist beeinflusst von Bands wie The Beach Boys.</p><a class="d-table-cell justify-content-center learn-more" href="kaiser_chiefs_band.html"
                                    style="width:289px;height:44px;padding:10px;">Tickets »</a></div>
                        <div class="col-sm-6 col-md-5 col-lg-4 item" style="height:503px;width:319px;margin-bottom:20px;">
                            <div class="d-table-cell box" style="background-image:url(&quot;/img/tool.png&quot;);height:343px;margin:0px;width:289px;margin-left:0px;margin-bottom:30px;background-repeat:no-repeat;background-position:center;"></div>
                            <p class="d-table-row description" style="width:289px;">Tool ist eine US-amerikanische Progressive-Metal- bzw. Alternative-Metal-Band aus Los Angeles.</p><a class="d-table-cell justify-content-center learn-more" href="tool_band.html" style="width:289px;height:44px;padding:10px;">Tickets »</a></div>
                    </div>
                </div>
                <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                    <h4 style="margin:0px 0px 20px;margin-bottom:20px;">Die besten Pop Konzerte</h4>
                    <div class="row d-flex justify-content-center features" style="padding-top:0px;margin-top:0px;margin-bottom:0px;padding-bottom:5px;margin-right:0px;margin-left:0px;">
                        <div class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;">
                            <div class="d-table-cell box" style="background-image:url(&quot;/img/zaz.png&quot;);height:343px;width:289px;margin-left:0px;background-repeat:no-repeat;background-position:center;"></div>
                            <p class="text-center d-table-row description" style="background-color:#ffffff;padding:0px;height:66px;width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="background-color:rgba(255,255,255,0);padding:10px;width:289px;">Mehr Infos »</a></div>
                        <div
                            class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;height:503px;">
                            <div class="d-table-cell box" style="background-image:url(&quot;/img/philipp_poisel.png&quot;);height:343px;width:289px;margin-left:0px;background-repeat:no-repeat;background-position:center;"></div>
                            <p class="d-table-row description" style="background-color:#ffffff;width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="background-color:rgba(255,255,255,0);width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
                    <div
                        class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;height:503px;">
                        <div class="d-table-cell box" style="background-image:url(&quot;/img/matt_simons.png&quot;);height:343px;width:289px;margin-left:0;background-repeat:no-repeat;background-position:center;"></div>
                        <p class="d-table-row description" style="background-color:#ffffff;width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="background-color:rgba(255,255,255,0);width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
                <div
                    class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;">
                    <div class="d-table-cell box" style="background-image:url(&quot;/img/elton_john.png&quot;);height:343px;margin:0px;width:289px;margin-left:0px;margin-bottom:30px;background-position:center;background-repeat:no-repeat;"></div>
                    <p class="d-table-row description" style="background-color:#ffffff;height:66px;width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="background-color:rgba(255,255,255,0);width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
            <div
                class="col-sm-6 col-md-5 col-lg-4 item" style="height:503px;width:319px;margin-bottom:20px;">
                <div class="d-table-cell box" style="background-image:url(&quot;/img/beck.png&quot;);height:343px;margin:0px;width:289px;margin-left:0px;margin-bottom:30px;background-repeat:no-repeat;background-position:center;"></div>
                <p class="d-table-row description" style="width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
        <div
            class="col-sm-6 col-md-5 col-lg-4 item" style="height:503px;width:319px;margin-bottom:20px;">
            <div class="d-table-cell box" style="background-image:url(&quot;/img/george_ezra.png&quot;);height:343px;margin:0px;width:289px;margin-left:0px;margin-bottom:30px;background-repeat:no-repeat;background-position:center;"></div>
            <p class="d-table-row description" style="width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
    </div>
    </div>
    <div id="item-1-3" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-3-tab">
        <h4 style="margin-bottom:20px;">Die schönsten Klassik Konzerte</h4>
        <div class="row d-flex justify-content-center features" style="padding-top:0px;margin-top:0px;margin-bottom:0px;padding-bottom:5px;margin-right:0px;margin-left:0px;">
            <div class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;">
                <div class="d-table-cell box" style="background-image:url(&quot;/img/max_richter.png&quot;);height:343px;width:289px;margin-left:0px;background-repeat:no-repeat;background-position:center;"></div>
                <p class="text-center d-table-row description" style="background-color:#ffffff;padding:0px;height:66px;width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="background-color:rgba(255,255,255,0);padding:10px;width:289px;">Mehr Infos »</a></div>
            <div
                class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;height:503px;">
                <div class="d-table-cell box" style="background-image:url(&quot;/img/classic_5.png&quot;);height:343px;width:289px;margin-left:0px;background-position:center;background-repeat:no-repeat;"></div>
                <p class="d-table-row description" style="background-color:#ffffff;width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="background-color:rgba(255,255,255,0);width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
        <div
            class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;height:503px;">
            <div class="d-table-cell box" style="background-image:url(&quot;/img/classic_2.png&quot;);height:343px;width:289px;margin-left:0;background-repeat:no-repeat;background-position:center;"></div>
            <p class="d-table-row description" style="background-color:#ffffff;width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="background-color:rgba(255,255,255,0);width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
    <div
        class="col-sm-6 col-md-5 col-lg-4 item" style="width:319px;margin-bottom:20px;">
        <div class="d-table-cell box" style="background-image:url(&quot;/img/classic_4.png&quot;);height:343px;margin:0px;width:289px;margin-left:0px;margin-bottom:30px;background-repeat:no-repeat;background-position:center;"></div>
        <p class="d-table-row description" style="background-color:#ffffff;height:66px;width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="background-color:rgba(255,255,255,0);width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
        <div
            class="col-sm-6 col-md-5 col-lg-4 item" style="height:503px;width:319px;margin-bottom:20px;">
            <div class="d-table-cell box" style="background-image:url(&quot;/img/classic_1.png&quot;);height:343px;margin:0px;width:289px;margin-left:0px;margin-bottom:30px;background-repeat:no-repeat;background-position:center;"></div>
            <p class="d-table-row description" style="width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
            <div
                class="col-sm-6 col-md-5 col-lg-4 item" style="height:503px;width:319px;margin-bottom:20px;">
                <div class="d-table-cell box" style="background-image:url(&quot;/img/olafur_arnalds_nils_frahm.png&quot;);height:343px;margin:0px;width:289px;margin-left:0px;margin-bottom:30px;background-repeat:no-repeat;background-position:center;"></div>
                <p class="d-table-row description" style="width:289px;">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a class="d-table-cell justify-content-center learn-more" href="#" style="width:289px;height:44px;padding:10px;">Mehr Infos »</a></div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
@endsection