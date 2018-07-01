@extends('layouts.master')

@section('content')
    <div class="container profile profile-view" id="profile">
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info absolue center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span>Profile save with success</span></div>
            </div>
        </div>
        <hr style="margin-bottom:0px;margin-top:22px;">
        <form>
            <div class="form-row profile-row" style="margin-top:42px;font-family:Roboto, sans-serif;">
                <div class="col-md-4 relative">
                    <div class="avatar">
                        <div class="avatar-bg center"></div>
                    </div>
                    <p class="text-center" style="color:#444f51;margin-top:38px;margin-bottom:10px;">Profilbild</p>
                </div>
                <div class="col-md-8">
                    <h3 style="color:#444f51;">Persönliche Daten</h3>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color:#444f51;">Vorname: <span style="margin-left:97px;"> {{ $user->firstName }} </span> </label></div>
                            <div class="form-group"><label style="color:#444f51;">Straße, Hausnummer: <span style="margin-left:10px;"> {{ $user->address }} </span></label></div>
                            <div class="form-group"><label style="color:#444f51;">Wohnort: <span style="margin-left:101px;"> {{ $user->city }} </span> </label></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color:#444f51;">Nachname: <span style="margin-left:97px;"> {{ $user->lastName }} </span> </label></div>
                            <div class="form-group"><label style="color:#444f51;">Postleitzahl: <span style="margin-left:91px;"> {{ $user->plz }} </span> </label></div>
                        </div>
                    </div>
                    <div class="form-group"><label style="color:#444f51;">Email: <span style="margin-left:121px;"> {{ $user->email }} </span> </label></div>
                    <div class="form-row">
                        <div class="col-md-12 content-right"><a class="btn btn-secondary form-btn" role="button" href="{{ url('/editprofile') }}" type="submit" style="background-color:#444f51;">Daten ändern</a></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
