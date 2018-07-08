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
                                        role="tab" aria-controls="item-1-1" aria-selected="true">modify/delete
                        EventSets</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab"
                                        aria-controls="item-1-2" aria-selected="false">add Eventset</a></li>


            </ul>
        </div>
        <div class="card-body" style="margin-top:0px;">
            <div id="nav-tabContent" class="tab-content">

                <!--modify delete EventSets-->
                <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                    <div class="table-responsive" style="color:#444f51;">

                        <form method="POST" action="/admin/delMod">
                            {{ csrf_field() }}

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>shortDescr</th>
                                    <th>longDescr</th>
                                    <th>deleteEvent</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($eventsets as $eventset)

                                    <tr>
                                        <td style="padding-top:18px;">{{ $eventset->id }}</td>

                                        <td style="padding-top:18px;">
                                            <input class="form-control" type="text" name="name{{ $eventset->id }}"
                                                   value="{{ $eventset->name }}">
                                        </td>

                                        <td style="padding-top:18px;">
                                            <textarea
                                                    class="form-control"
                                                    rows="3"
                                                    name="shortDescription{{ $eventset->id }}"
                                                    style="width:340px;background-color:white;color:black;font-family:Roboto, sans-serif;">{{ $eventset->shortDescription }}</textarea>
                                        </td>

                                        <td style="padding-top:18px;">
                                             <textarea
                                                     class="form-control"
                                                     rows="3"
                                                     name="longDescription{{ $eventset->id }}"
                                                     style="width:340px;background-color:white;color:black;font-family:Roboto, sans-serif;">{{ $eventset->longDescription }}</textarea>
                                        </td>

                                        <td>
                                            <button name="deleteEventset{{$eventset->id}}" class="btn btn-primary"
                                                    type="submit">Delete Row
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach

                                <tr>
                                    <td>
                                        <button class="btn btn-primary" type="reset">Reset Changes</button>
                                    </td>

                                    <td>
                                        <button class="btn btn-primary" name="updateEventsets" type="submit">Commit
                                            Changes
                                        </button>
                                    </td>
                                </tr>
                                </tbody>


                            </table>
                        </form>
                    </div>
                </div>

                <!--add eventsets-->
                <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                    <div class="table-responsive" style="color:#444f51;">

                        <form method="POST" action="/admin/add" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>name</th>
                                    <th>shortDescr</th>
                                    <th>longDescr</th>
                                    <th>teaserImage</th>
                                    <th>bannerImage</th>
                                    <th>eventCount</th>
                                    <th>category</th>

                                </tr>
                                </thead>
                                <tbody>


                                <tr>

                                    <td style="padding-top:18px;">
                                        <input class="form-control" type="text" name="name">
                                    </td>

                                    <td style="padding-top:18px;">
                                            <textarea
                                                    class="form-control"
                                                    rows="3"
                                                    name="shortDescription"
                                                    style="width:200px;background-color:white;color:black;font-family:Roboto, sans-serif;"></textarea>
                                    </td>

                                    <td style="padding-top:18px;">
                                             <textarea
                                                     class="form-control"
                                                     rows="3"
                                                     name="longDescription"
                                                     style="width:200px;background-color:white;color:black;font-family:Roboto, sans-serif;"></textarea>
                                    </td>

                                    <td style="padding-top:18px;">
                                        <input type="file" class="form-control" name="teaserImage" style="width:340px;height:38px;margin-bottom:10px;padding-top:0px;padding-bottom:0px;">
                                    </td>

                                    <td style="padding-top:18px;">
                                        <input type="file" class="form-control" name="bannerImage" style="width:340px;height:38px;margin-bottom:10px;padding-top:0px;padding-bottom:0px;">
                                    </td>

                                    <td style="padding-top:18px;">
                                        <input type="text" class="form-control" name="eventCount" style="width:50px;height:38px;margin-bottom:10px;padding-top:0px;padding-bottom:0px;">
                                    </td>

                                    <td style="padding-top:18px;">

                                        <select name="category"
                                                style="margin-top:6px;">
                                            @foreach($categories as $category)

                                                <option value="{{ $category->name }}" @if($loop->first) selected @endif>{{ $category->name }}</option>

                                            @endforeach

                                        </select>

                                    </td>


                                </tr>


                                <tr>
                                    <td>
                                        <button class="btn btn-primary" type="reset">Clear Form</button>

                                        <button class="btn btn-primary" name="addEventset" type="submit">Add to Database
                                        </button>
                                    </td>
                                </tr>
                                </tbody>


                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>


    </script>

@endsection