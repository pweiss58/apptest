@extends('layouts.master')


@section ('content')

    <style class="">
    </style>


    <div class="jumbotron flex-row-reverse"
         style="background-image:url(&quot;/img/tickets.png&quot;);background-repeat:no-repeat;background-position:center;background-size:cover;">
        <h1 style="color:#eaeaea;">Administration Controls</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab"
                                        role="tab" aria-controls="item-1-1" aria-selected="true">modify/delete EventSets</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab"
                                        aria-controls="item-1-2" aria-selected="false">add Event</a></li>


            </ul>
        </div>
        <div class="card-body" style="margin-top:0px;">
            <div id="nav-tabContent" class="tab-content">

                <!--modify delete EventSets-->
                <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                    <div class="table-responsive" style="color:#444f51;">

                        <form method="POST" action="/admin">
                            {{ csrf_field() }}

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>shortDescr</th>
                                    <th>longDescr</th>
                                    <th>deleteEvent</th>
                                    <!--
                                    $table->increments('id');
                                    $table->timestamps();
                                    $table->string('name');
                                    $table->text('shortDescription');
                                    $table->text('longDescription');
                                    $table->string('teaserImage');
                                    $table->string('bannerImage');
                                    $table->integer('eventCount');

                                    $table->integer('category_id')->unsigned()->nullable();
                                    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                                    -->
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($eventsets as $eventset)

                                    <tr>
                                        <td style="padding-top:18px;">{{ $eventset->id }}</td>
                                        <td style="padding-top:18px;">{{ $eventset->name }}</td>
                                        <td style="padding-top:18px;">sdescr</td>
                                        <td>Test
                                            <!--<select name="seatsbp{{ $eventset->id }}"
                                                    style="margin-top:6px;">
                                                <option value="0" selected>0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            -->
                                        </td>
                                        <td>
                                            <button name="deleventset{{$eventset->id}}" class="btn btn-primary"
                                                    type="submit">Delete
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                <!--Saalplanbuchung-->
                <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                    <div class="table-responsive" style="color:#444f51;">

                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" role="tablist">



                                </ul>
                            </div>
                            <div class="card-body" style="margin-top:0px;">
                                <div id="nav-tabContent" class="tab-content">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>


    </script>

@endsection