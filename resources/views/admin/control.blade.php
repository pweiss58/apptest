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
                                    <th>deleteEvent with EventNr</th>
                                    <th>deleteEventset</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($eventsets as $eventset)

                                    <?php $events = DB::table('events')->where([
                                        ['eventset_id', '=', $eventset->id],
                                    ])->get(); ?>

                                    <tr>
                                        <td style="padding-top:18px;width:10px;">{{ $eventset->id }}</td>

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
                                            <select id="eventNr" name="eventNr{{ $eventset->id }}"
                                                    style="margin-top:6px;">

                                                @foreach($events as $event)
                                                    <option value="{{ $event->eventNr }}"
                                                            @if($loop->first) selected @endif>{{ $event->eventNr }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <button name="{{$eventset->id}}" class="btn btn-primary"
                                                    type="submit">Delete Event
                                            </button>
                                        </td>

                                        <td>
                                            <button name="deleteEventset{{$eventset->id}}" class="btn btn-primary"
                                                    type="submit">Delete Row
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach


                                <button class="btn btn-primary" type="reset">Reset Changes</button>

                                <button class="btn btn-primary" name="updateEventsets" type="submit"
                                        style="margin-left:8px;">Commit
                                    Changes
                                </button>

                                <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#modal1"
                                        style="margin-left:8px;">
                                    Add Event to any Eventset
                                </button>

                                </tbody>

                            </table>
                        </form>
                    </div>
                </div>

                <!-- add event popup -->
                <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="color:#444f51;">Registrierung</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body" style="width:500px;padding-bottom:0px;height:505px;">
                                <div class="row register-form">
                                    <div class="col-md-8 offset-md-2"
                                         style="margin-left:0px;padding-right:0px;padding-left:0px;width:347px;">

                                        <form class="custom-form" method="POST" action="/admin/addEvent"
                                              style="width:495px;margin:0px;padding-top:10px;padding-bottom:0px;font-family:Roboto, sans-serif;">
                                            {{ csrf_field() }}

                                            <div class="form-row d-flex form-group"
                                                 style="height:30px;width:465px;margin-bottom:10px;">
                                                <div class="col-sm-4 label-column" style="margin-right:5px;">
                                                    <label class="col-form-label" for="startDate">startDate; Y-m-d
                                                        H:i:s</label>
                                                </div>
                                                <div class="col-sm-6 input-column">
                                                    <input class="form-control" type="text" id="startDate"
                                                           name="startDate" required
                                                           style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                                </div>
                                            </div>

                                            <div class="form-row d-flex form-group"
                                                 style="height:30px;width:465px;margin-bottom:10px;">
                                                <div class="col-sm-4 label-column" style="margin-right:5px;">
                                                    <label class="col-form-label" for="endDate">endDate; Y-m-d
                                                        H:i:s</label>
                                                </div>
                                                <div class="col-sm-6 input-column">
                                                    <input class="form-control" type="text" id="endDate"
                                                           name="endDate" required
                                                           style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                                </div>
                                            </div>

                                            <div class="form-row d-flex form-group"
                                                 style="height:30px;width:465px;margin-bottom:10px;">
                                                <div class="col-sm-4 label-column" style="margin-right:5px;">
                                                    <label class="col-form-label" for="basePrice">basePrice</label>
                                                </div>
                                                <div class="col-sm-6 input-column">
                                                    <input class="form-control" type="text" id="basePrice"
                                                           name="basePrice" required
                                                           style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                                </div>
                                            </div>

                                            <div class="form-row d-flex form-group"
                                                 style="height:30px;width:465px;margin-bottom:10px;">
                                                <div class="col-sm-4 label-column" style="margin-right:5px;">
                                                    <label class="col-form-label" for="eventset_id">eventset_id</label>
                                                </div>
                                                <div class="col-sm-6 input-column">
                                                    <select id="eventset_id" name="eventset_id"
                                                            style="margin-top:6px;">

                                                        @foreach($eventsets as $eventset)
                                                            <option value="{{ $eventset->id }}"
                                                                    @if($loop->first) selected @endif>{{ $eventset->id }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row d-flex form-group"
                                                 style="height:30px;width:465px;margin-bottom:10px;">
                                                <div class="col-sm-4 label-column" style="margin-right:5px;">
                                                    <label class="col-form-label" for="location_id">location_id</label>
                                                </div>
                                                <div class="col-sm-6 input-column">
                                                    <select id="location_id" name="location_id"
                                                            style="margin-top:6px;">

                                                        @foreach($locations as $location)
                                                            <option value="{{ $location->id }}"
                                                                    @if($loop->first) selected @endif>{{ $location->id }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <input type="submit" value="Absenden" class="btn btn-light submit-button">

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="width:500px;"></div>
                        </div>
                    </div>
                </div>

                <!-- delete event popup
                <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="color:#444f51;">Registrierung</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body" style="width:500px;padding-bottom:0px;height:505px;">
                                <div class="row register-form">
                                    <div class="col-md-8 offset-md-2"
                                         style="margin-left:0px;padding-right:0px;padding-left:0px;width:347px;">

                                        <form class="custom-form" method="POST" action="/admin/deleteEvent"
                                              style="width:495px;margin:0px;padding-top:10px;padding-bottom:0px;font-family:Roboto, sans-serif;">
                                            {{ csrf_field() }}

                                            <div class="form-row d-flex form-group"
                                                 style="height:30px;width:465px;margin-bottom:10px;">
                                                <div class="col-sm-4 label-column" style="margin-right:5px;">
                                                    <label class="col-form-label" for="eventset_id">eventset_id</label>
                                                </div>
                                                <div class="col-sm-6 input-column">
                                                    <select id="eventset_id" name="eventset_id"
                                                            style="margin-top:6px;">

                                                        @foreach($eventsets as $eventset)
                                                            <option value="{{ $eventset->id }}"
                                                                    @if($loop->first) selected @endif>{{ $eventset->id }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row d-flex form-group"
                                                 style="height:30px;width:465px;margin-bottom:10px;">
                                                <div class="col-sm-4 label-column" style="margin-right:5px;">
                                                    <label class="col-form-label" for="eventNr">eventNr</label>
                                                </div>
                                                <div class="col-sm-6 input-column">
                                                    <select id="eventNr" name="eventNr"
                                                            style="margin-top:6px;">

                                                        @foreach($locations as $location)
                                                            <option value="{{ $location->id }}"
                                                                    @if($loop->first) selected @endif>{{ $location->id }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <input type="submit" value="Absenden" class="btn btn-light submit-button">

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="width:500px;"></div>
                        </div>
                    </div>
                </div>-->

                <!--add eventsets-->
                <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                    <div class="table-responsive" style="color:#444f51;">

                        <form method="POST" action="/admin/addEventset" enctype="multipart/form-data">
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
                                        <input type="file" class="form-control" name="teaserImage"
                                               style="width:340px;height:38px;margin-bottom:10px;padding-top:0px;padding-bottom:0px;">
                                    </td>

                                    <td style="padding-top:18px;">
                                        <input type="file" class="form-control" name="bannerImage"
                                               style="width:340px;height:38px;margin-bottom:10px;padding-top:0px;padding-bottom:0px;">
                                    </td>

                                    <td style="padding-top:18px;">
                                        <input type="text" class="form-control" name="eventCount"
                                               style="width:50px;height:38px;margin-bottom:10px;padding-top:0px;padding-bottom:0px;">
                                    </td>

                                    <td style="padding-top:18px;">

                                        <select name="category"
                                                style="margin-top:6px;">
                                            @foreach($categories as $category)

                                                <option value="{{ $category->name }}"
                                                        @if($loop->first) selected @endif>{{ $category->name }}</option>

                                            @endforeach

                                        </select>

                                    </td>


                                </tr>


                                <tr>
                                    <td>
                                        <button class="btn btn-primary" type="reset">Clear Form</button>

                                        <button style="margin-left:8px;" class="btn btn-primary" name="addEventset"
                                                type="submit">Add to Database
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