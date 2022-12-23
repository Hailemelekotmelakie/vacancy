<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{url('/css/login-signup.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @extends('layouts.navigationBar')
    @section('content')
    <div class="upperWrapper">
        <div class="wrapper">
            <div class="title-text">
                <div class="title login">Login Form</div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form method="POST" action="{{url('/loginChecker')}}" class="login">
                        @csrf
                        <span class="pass-link">
                            @if(Session::has('NotFound'))
                            <div class="validationErrorFail">
                                <h4 class="validationError">{{Session::get('NotFound')}}</h4>
                            </div>
                            @endif
                            @if(Session::has('Success'))
                            <div class="validationErrorSuccess">
                                <h4 class="validationSuccess">{{Session::get('Success')}}</h4>
                            </div>
                            @endif
                        </span>
                        <div class="field">
                            <input type="text" name="email" placeholder="Email Address" value="{{old('email')}}"
                                required>
                            @error('email')
                            <span class="validationError"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="pass-link">
                            @error('password')
                            <span class="validationError"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="pass-link"><a href="{{URL('/password-recovery')}}">Forgot password?</a></div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Login">
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