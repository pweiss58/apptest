@extends('layouts.master')


@section ('content')

    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5 style="margin-top:40px;margin-bottom:17px;">Vielen Dank für Ihre Bestellung!</h5>
                    <p style="color:#000000;">Ihre Bestellnummer lautet: {{ $orderNr }}</p>
                    <p style="color:#000000;">Sollten Sie Fragen haben, erreichen Sie uns per Email oder Telefon.</p>
                    <p style="color:#000000;">Email: info@kartenhaus.de</p>
                    <p style="color:#000000;">Telefon:&nbsp;+49 (0) 9281 / 409 3000</p>
                </div>
            </div>
        </div>
    </div>
    <div></div>

@endsection