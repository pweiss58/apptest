@extends('layouts.master')


@section ('content')

    <div class="container" id="info-container">
        <div class="row" style="font-family:Roboto, sans-serif;color:#444f51;">
            <div class="col-md-12">
                <hr style="margin-bottom:10px;">
                <h4 class="text-center" style="margin-bottom:-8px;">Kontakt</h4>
                <hr style="margin-top:18px;margin-bottom:-4px;">
            </div>
            <div class="col-12 col-sm-6 col-md-6" id="contact-box">
                <p id="contact-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nam magnam natus tempora cumque, aliquam deleniti voluptatibus voluptas. Repellat vel, et itaque commodi iste ab, laudantium voluptas deserunt nobis. </p>
                <div class="info-box"><i class="fa fa-map-marker my-info-icons"></i><span>Alfons-Goppel-Platz 1, 95028 Hof/Saale</span></div>
                <div class="info-box"><i class="fa fa-envelope my-info-icons"></i><span>kontakt@tickethall.de</span></div>
                <div class="info-box"><i class="fa fa-phone-square my-info-icons"></i><span>+49 (0) 9281 / 409 3000</span></div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 site-form">
                <form id="my-form">
                    <div class="form-group"><label class="sr-only" for="firstname">First Name</label><input class="form-control" type="text" name="firstname" placeholder="Vorname" autofocus="" id="firstname"></div>
                    <div class="form-group"><label class="sr-only" for="lastname">Last Name</label><input class="form-control" type="text" name="lastname" placeholder="Nachname" id="lastname"></div>
                    <div class="form-group"><label class="sr-only" for="phonenumber">Phone Number</label><input class="form-control" type="tel" name="phonenumber" required="" placeholder="Telefon" id="phonenumber"></div>
                    <div class="form-group"><label class="sr-only" for="email">Email Address</label><input class="form-control" type="text" name="email" required="" placeholder="Email" id="email"></div>
                    <div class="form-group"><label class="sr-only" for="messages">Last Name</label><textarea class="form-control" rows="8" name="messages" required="" placeholder="Nachricht"></textarea></div><button class="btn btn-secondary" type="submit" id="form-btn" style="color:#ffffff;background-color:#444f51;">Absenden</button></form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection