@extends('layouts.master')

@section('content')
<div class="container profile profile-view">
    <!--<div class="row">
      <div class="col-md-12 alert-col relative">
            <div class="alert alert-info absolue center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span>Profil erfolgreich bearbeitet!</span></div>
        </div>
    </div>-->
    <hr style="margin-bottom:0px;margin-top:22px;">

    <form class="custom-form" method="POST" action="{{ route('profile') }}">
        {{ csrf_field() }}

        <div class="form-row profile-row" style="margin-top:42px;font-family:Roboto, sans-serif;">
            <div class="col-md-4 relative">
                <div class="avatar">
                    <div class="avatar-bg center"></div>
                </div>
                <p class="text-center" style="color:#444f51;margin-top:38px;margin-bottom:10px;">Profilbild hochladen</p><input type="file" class="form-control" name="avatar-file" style="width:340px;height:38px;margin-bottom:10px;padding-top:0px;padding-bottom:0px;"></div>
            <div class="col-md-8">
                <h3 style="color:#444f51;">Persönliche Daten ändern</h3>
                <hr>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="firstName" style="color:#444f51;">Vorname</label>
                            <input class="form-control" id="firstName" value="{{ $user->firstName }}" type="text" name="firstName">
                        </div>

                        <div class="form-group">
                            <label for="address" style="color:#444f51;">Straße, Hausnummer</label>
                            <input id="address" class="form-control" value="{{ $user->address }}" type="text" name="address">
                        </div>

                        <div class="form-group">
                            <label for="city" style="color:#444f51;">Wohnort</label>
                            <input id="city" class="form-control" value="{{ $user->city }}" type="text" name="city">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="lastName" style="color:#444f51;">Nachname</label>
                            <input id="lastName" class="form-control" value="{{ $user->lastName }}" type="text" name="lastName">
                        </div>

                        <div class="form-group">
                            <label for="plz" style="color:#444f51;">Postleitzahl</label>
                            <input id="plz" class="form-control" value="{{ $user->plz }}" type="text" name="plz">
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" style="color:#444f51;">Email</label>
                    <input id="email" class="form-control" type="email" required="" value="{{ $user->email }}" oninvalid="this.setCustomValidity('Dieses Feld muss eine gültige E-Mail-Adresse beinhalten.')"
                           oninput="setCustomValidity('')" name="email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="pw" style="color:#444f51;">Passwort</label>
                            <input id="pw" class="form-control" type="password" name="password" autocomplete="off" oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen.')"
                                   oninput="setCustomValidity('')" required="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="pw_conf" style="color:#444f51;">Passwort wiederholen</label>
                            <input id="pw_conf" class="form-control" type="password" name="password_confirmation" oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen.')"
                                   oninput="setCustomValidity('')" autocomplete="off" required="">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 content-right">
                        <input type="submit" value="Speichern" class="btn btn-secondary form-btn submit-button" style="background-color:#444f51;">
                        <input type="reset" value="Zurücksetzen" class="btn btn-secondary form-btn submit-button" style="background-color:#444f51;">

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
