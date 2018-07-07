@extends('layouts.master')


@section ('content')

    <style class="">
    </style>


    <div class="jumbotron flex-row-reverse"
         style="background-image:url(&quot;/img/tickets.png&quot;);background-repeat:no-repeat;background-position:center;background-size:cover;">
        <h1 style="color:#eaeaea;">Administrative Controls</h1>
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

                        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Eventset</button>
                        <div>

                            <!-- Table-to-load-the-data Part -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>sDescr</th>
                                    <th>lDescr</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="eventsets-list" name="eventsets-list">
                                @foreach ($eventsets as $eventset)
                                    <tr id="eventset{{$eventset->id}}">
                                        <td>{{$eventset->id}}</td>
                                        <td>{{$eventset->name}}</td>
                                        <td>{{$eventset->shortDescription}}</td>
                                        <td>{{$eventset->longDescription}}</td>
                                        <td>{{$eventset->created_at}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$eventset->id}}">Edit</button>
                                            <button class="btn btn-danger btn-xs btn-delete delete-eventset" value="{{$eventset->id}}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- End of Table-to-load-the-data Part -->
                            <!-- Modal (Pop up when detail button clicked) -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Eventset Editor</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="frmEventsets" name="frmEventsets" class="form-horizontal" novalidate="">

                                                <div class="form-group error">
                                                    <label for="inputEventset" class="col-sm-3 control-label">Eventset</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control has-error" id="eventset" name="eventset" placeholder="eventset" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                                            <input type="hidden" id="id" name="id" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <meta name="_token" content="{!! csrf_token() !!}" />
                    <script src="{{ asset('js/jquery.min.js') }}"></script>
                    <script src="{{ asset('css/bootstrap.min.css') }}"></script>
                    <script src="{{asset('js/ajxcrud.js')}}"></script>
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