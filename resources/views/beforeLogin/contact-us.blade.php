<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/contact.css')}}">

    <title>contact us</title>
</head>

<body>
    @extends('layouts.navigationBar')
    @section('content')

    <div class="UpperContainer">
        <div id="background" class="background">
            <div id="backgroundUpper" class="backgroundUpper">
                <div class="backgroundUpperLeft">
                    <div onclick="white()" class="white"></div>
                    <div onclick="yellow()" class="yellow"></div>
                    <div onclick="green()" class="green"></div>
                    <div onclick="buna()" class="buna"></div>
                </div>
                <div class="backgroundUpperRight">
                    <div class="whiteSmall"></div>
                    <div class="whiteSmall"></div>
                    <div class="whiteSmall"></div>
                </div>
            </div>
            <div class="successDiv">
                @if(session()->has('success'))
                <div class="successForm">{{session('success')}}</div>
                @endif
            </div>
            <div class="backgroundLower">
                <div class="backgroundLowerLeft">
                    <div class="contactUs">Contact us</div>
                    <div class="contactUsSocialmedias">
                        <a href="mailto:hailemelekotmelakie1991@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                        <a href="tel:+251947053537"><i class="fa-solid fa-phone"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin"></i></a>
                        <a href=""><i class="fa-brands fa-telegram"></i></a>
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                    </div>
                    <div class="contactInfo">CONTACT INFO : +251947053537</div>
                    <div class="contactInfo">Hailemelekotmelakie1991@gmail.com</div>
                </div>
                <div class="backgroundLowerRight">
                    <form class="formData" method="post" action="{{url('contactFormsData')}}">
                        @csrf
                        <input type="text" name="name" class="allFormInputs" placeholder="Name" value="{{old('name')}}">
                        @error('name')
                        <div class="validationError"> {{$message}}</div>
                        @enderror
                        <input type="email" name="email" class="allFormInputs" placeholder="Email"
                            value="{{old('email')}}">
                        @error('email')
                        <div class="validationError">{{$message}}</div>
                        @enderror
                        <input type="number" name="phoneNo" class="allFormInputs" placeholder="Contact No"
                            value="{{old('phoneNo')}}">
                        @error('phoneNo')
                        <div class="validationError">{{$message}}</div>
                        @enderror
                        <input type="text" name="message" class="allFormInputs" placeholder="Message"
                            value="{{old('message')}}">
                        @error('message')
                        <div class="validationError">{{$message}}</div>
                        @enderror
                        <button class="submitButton">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script>
    function white() {
        document.getElementById('background').style.backgroundColor = '#289166';
        document.getElementById('backgroundUpper').style.backgroundColor = "#01693e";
    }

    function yellow() {
        document.getElementById('background').style.backgroundColor = '#8f8d0c';
        document.getElementById('backgroundUpper').style.backgroundColor = "#6c6b0c";
    }

    function green() {
        document.getElementById('background').style.backgroundColor = '#c5421d';
        document.getElementById('backgroundUpper').style.backgroundColor = "#912b0e";
    }

    function buna() {
        document.getElementById('background').style.backgroundColor = '#8788ee';
        document.getElementById('backgroundUpper').style.backgroundColor = "#5e5fbf";
    }
    </script>
</body>

</html>