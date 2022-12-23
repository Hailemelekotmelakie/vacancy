<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Verification Form</title>
    <link rel="stylesheet" href="{{url('/css/login-signup.css')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @extends('layouts.navigationBar')
    @section('content')
    <div class="upperWrapper">
        <div class="wrapper">
            <div class="title-text">
                <div class="title login">Verification Form</div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form method="POST" action="{{url('/sendReset')}}" class="login">
                        @csrf
                        <span class="pass-link">
                            @if(Session::has('NotCorrect'))
                            <h4 class="validationError">{{Session::get('NotCorrect')}}</h4>
                            @endif
                        </span>
                        <div class="field">
                            <input type="text" name="email" placeholder="Email Address" value="{{old('email')}}"
                                required>
                            @error('email')
                            <span class="validationError"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Send code">
                        </div>
                        <div class="signup-link">Not a member? <a href="{{url('/signup')}}">Signup now</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>