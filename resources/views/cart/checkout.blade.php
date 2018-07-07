@extends('layouts.master')

<style>
    .selectorbox {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .selectorbox input {
        position: absolute;
        opacity: 0;
    }

    .radiobtn {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
        margin-top: 38px;
    }

    .selectorbox:hover input ~ .radiobtn {
        background-color: #ccc;
    }

    .selectorbox input:checked ~ .radiobtn {
        background-color: #2196F3;
    }

    .radiobtn:after {
        content: "";
        position: absolute;
        display: none;
    }

    .selectorbox input:checked ~ .radiobtn:after {
        display: block;
    }

    .selectorbox .radiobtn:after {
        top: 9px;
        left: 9px;
        width: 0px;
        height: 0px;
        border-radius: 50%;
        background: white;
    }

    .border_around_pprocessor {
        padding-top: 7px;
        padding-bottom: 7px;
        padding-right: 5px;
        padding-left: 5px;
        border: 1px solid lightgray;
    }

</style>

@section ('content')



    <div>
        <div class="container">

            <form method="post" action="/checkoutComplete">
                {{ csrf_field() }}

                <div class="row">

                    <div style="float:left;margin-left:20px;">
                        <div>
                            <label class="selectorbox">
                                <input type="radio" checked="checked" name="radio">
                                <img src="/img/ec_small_logo.png" alt="ELV and EC Logo"
                                     class="border_around_pprocessor">
                                <span class="radiobtn"></span>
                            </label>
                        </div>
                        <div>
                            <label class="selectorbox">
                                <input type="radio" checked="checked" name="radio">
                                <img src="/img/mastercard_small_logo.png" alt="Mastercard Logo"
                                     class="border_around_pprocessor">
                                <span class="radiobtn"></span>
                            </label>
                        </div>
                        <div>
                            <label class="selectorbox">
                                <input type="radio" checked="checked" name="radio">
                                <img src="/img/visa_small_logo.png" alt="Visa Logo" class="border_around_pprocessor">
                                <span class="radiobtn"></span>
                            </label>
                        </div>
                    </div>

                    <div style="margin-left: 150px;">
                        <div>
                            <label class="selectorbox">
                                <input type="radio" checked="checked" name="radio">
                                <img src="/img/paypal_small_logo.png" alt="Paypal Logo"
                                     class="border_around_pprocessor">
                                <span class="radiobtn"></span>
                            </label>
                        </div>
                        <div>
                            <label class="selectorbox">
                                <input type="radio" checked="checked" name="radio">
                                <img src="/img/sofortueberweisung_small_lo.png" alt="Sofortueberweisung Logo"
                                     class="border_around_pprocessor">
                                <span class="radiobtn"></span>
                            </label>
                        </div>
                        <div>
                            <label class="selectorbox">
                                <input type="radio" checked="checked" name="radio">
                                <img src="/img/paysafecard_small_logo.png" alt="Paysafecard Logo"
                                     class="border_around_pprocessor">
                                <span class="radiobtn"></span>
                            </label>
                        </div>
                    </div>


                </div>

                <div class="row" style="margin-top:30px;margin-left:5px;">
                    <button class="btn btn-primary" type="submit"
                            style="margin-right:0px;margin-left:0px;margin-bottom:10px;">Bestellung abschließen
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div></div>

@endsection