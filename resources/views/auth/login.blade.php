@extends('layouts.master')

@section('content')

    <!-- alert message -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif


    <!-- Login -->
    <div class="login-dark" style="height:600px;background-image:url(&quot;/img/concert.jpg&quot;);margin-top:0px;">
        <form method="POST" action="{{ route('login') }}" style="background-color:#ffffff;padding-top:25px;">
            {{ csrf_field() }}

            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="color:#6c757d;"></i></div>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <input class="form-control" type="username" name="username" id="username" multiple="" placeholder="Benutzername" inputmode="username" value="{{ old('username') }}" required autofocus oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen.')"
                       oninput="setCustomValidity('')" style="color:#313437;">

            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input class="form-control" type="password" name="password" id="password" placeholder="Passwort" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen.')"
                       oninput="setCustomValidity('')" style="color:#313437;">

            </div>

            <div style="margin-bottom: 5px">
            @if ($errors->has('username'))
                <span class="help-block">
                        <strong style="color: black">{{ $errors->first('username') }}</strong>
                    </span>
            @endif
            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
            </div>

            <div class="form-check" style="font-size:14px;margin-bottom:-15px;">
                <input class="form-check-input" type="checkbox" name="remember" id="formCheck-6" style="margin-top:2px;">
                <label class="form-check-label" for="formCheck-6" style="font-family:Roboto, sans-serif;color:#1485ee;">Eingeloggt bleiben.</label>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" style="background-color:#444f51;">Log In</button>
            </div>

            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal1" style="font-size:16px;background-color:#444f51;width:240px;margin-top:0px;">Noch nicht registriert?</button>
            <a class="btn btn-link btn-sm" role="button" href="" data-toggle="modal" data-target="#modal2" style="width:240px;margin-top:7px;">Passwort vergessen?</a>
        </form>
    </div>
    <div></div>

    <!-- Register -->
    <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color:#444f51;">Registrierung</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body" style="width:500px;padding-bottom:0px;height:505px;">
                    <div class="row register-form">
                        <div class="col-md-8 offset-md-2" style="margin-left:0px;padding-right:0px;padding-left:0px;width:347px;">

                            <form class="custom-form" method="POST" action="{{ route('register') }}" style="width:495px;margin:0px;padding-top:10px;padding-bottom:0px;font-family:Roboto, sans-serif;">
                                {{ csrf_field() }}

                                <div class="form-row d-flex form-group{{ $errors->has('username') ? ' has-error' : '' }}" style="height:30px;width:465px;margin-bottom:10px;">
                                    <div class="col-sm-4 label-column" style="margin-right:5px;">
                                        <label class="col-form-label" for="username">Benutzername *</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="text" id="username" name="username" value="{{ old('username') }}" required autofocus oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen.')"
                                               oninput="setCustomValidity('')" style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="height:30px;width:465px;margin-bottom:10px;">
                                    <div class="col-sm-4 label-column" style="margin-right:5px;">
                                        <label class="col-form-label" for="password">Passwort *</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="password" id="password" name="password" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen.')"
                                               oninput="setCustomValidity('')" style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row form-group" style="height:30px;width:465px;margin-bottom:10px;">
                                    <div class="col-sm-4 label-column" style="margin-right:5px;width:161px;">
                                        <label class="col-form-label" for="password-repeat" style="width:161px;">Passwort wdh. *</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="password" id="password-repeat" name="password_confirmation" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen.')"
                                               oninput="setCustomValidity('')" style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                    </div>
                                </div>

                                <div class="form-row form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="height:30px;width:465px;margin-bottom:10px;">
                                    <div class="col-sm-4 label-column" style="margin-right:5px;">
                                        <label class="col-form-label" for="email">Email *</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required oninvalid="this.setCustomValidity('Dieses Feld muss eine gültige E-Mail-Adresse beinhalten.')"
                                               oninput="setCustomValidity('')" style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row form-group" style="height:30px;width:465px;margin-bottom:10px;">
                                    <div class="col-sm-4 label-column" style="margin-right:5px;">
                                        <label class="col-form-label" for="firstName">Vorname</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                    </div>
                                </div>

                                <div class="form-row form-group" style="height:30px;width:465px;margin-bottom:10px;">
                                    <div class="col-sm-4 label-column" style="margin-right:5px;">
                                        <label class="col-form-label" for="lastName">Nachname</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                    </div>
                                </div>

                                <div class="form-row form-group" style="height:30px;width:465px;margin-bottom:10px;">
                                    <div class="col-sm-4 label-column" style="margin-right:5px;">
                                        <label class="col-form-label" for="address">Straße + Hausnr.</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="text" id="address" name="address" value="{{ old('address') }}" style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                    </div>
                                </div>

                                <div class="form-row form-group" style="height:30px;width:465px;margin-bottom:10px;">
                                    <div class="col-sm-4 label-column" style="margin-right:5px;">
                                        <label class="col-form-label" for="plz">Postleitzahl</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="text" id="plz" name="plz" value="{{ old('plz') }}" style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                    </div>
                                </div>

                                <div class="form-row form-group" style="height:30px;width:465px;margin-bottom:10px;">
                                    <div class="col-sm-4 label-column" style="margin-right:5px;">
                                        <label class="col-form-label" for="city">Wohnort</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="text" id="city" name="city" value="{{ old('city') }}" style="height:30px;margin-left:7px;padding-top:0;padding-bottom:0;">
                                    </div>
                                </div>

                                <p class="text-left" style="font-size:10px;color:#444f51;">* Pflichtfeld</p>

                                <div class="form-check{{ $errors->has('checkedAGB') ? ' has-error' : '' }}">
                                    <input class="form-check-input" type="checkbox" name="agbCheck" required oninvalid="this.setCustomValidity('Bitte bestätigen.')"
                                           oninput="setCustomValidity('')" id="formCheck-6" style="margin-top:2px;">
                                    <label class="form-check-label" for="formCheck-6" style="font-family:Roboto, sans-serif;color:#1485ee;">Ich habe die AGBs gelesen und akzeptiere sie.</label>
                                </div>

                                <!--<button class="btn btn-light submit-button" type="button">Absenden</button>-->
                                <input type="submit" value="Absenden" class="btn btn-light submit-button">


                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="width:500px;"></div>
            </div>
        </div>
    </div>

    <!-- Passwort vergessen -->
    <div class="modal fade" role="dialog" tabindex="-1" id="modal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color:#444f51;">Neues Passwort anfordern</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body" style="width:500px;padding-bottom:0px;height:146px;">
                    <div class="row d-block register-form">
                        <div class="col-md-8 offset-sm-0 offset-md-2" style="margin-left:0px;padding-right:0px;padding-left:0px;width:495px;">
                            <form class="align-content-center align-self-center custom-form" style="width:495px;margin:0px;padding-top:10px;padding-bottom:0px;font-family:Roboto, sans-serif;">
                                <div class="form-row form-group" style="height:30px;width:505px;margin-bottom:10px;margin-right:0px;padding-right:57px;margin-left:-76px;">
                                    <div class="col-sm-4 label-column" style="margin-right:0px;padding-right:0px;"><label class="col-form-label" for="email-input-field" style="margin-top:8px;">Email</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="email" style="height:50px;margin-left:7px;"></div>
                                </div><button class="btn btn-light submit-button" type="button">Absenden</button></form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="width:500px;"></div>
            </div>
        </div>
    </div>
@endsection
