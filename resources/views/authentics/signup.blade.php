<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="{{url('/css/login-signup.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @extends('layouts.navigationBar')
    @section('content')
    <div class="upperWrapper">
        <div class="wrapper">
            <div class="title-text">
                <div class="title signup">Signup Form</div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action="{{url('/register')}}" method="post" class="signup">
                        @csrf
                        <div class="field">
                            <input type="text" name="fullName" placeholder="full name" value="{{old('fullName')}}"
                                required>
                            @error('fullName')
                            <span class="validationError"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="text" name="email" placeholder="Email Address" value="{{old('email')}}"
                                required>
                            @error('email')
                            <span class="validationError"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="password" name="password" placeholder="Password" value="{{old('password')}}"
                                required>
                            @error('password')
                            <span class="validationError"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="password" name="passwordConfirmation" placeholder="Confirm password" required>
                        </div>
                        <div class="pass-link">
                            @error('passwordConfirmation')
                            <span class="validationError"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Signup">
                        </div>
                        <div class="signup-link">Already a member? <a href="{{url('/login')}}">Login now</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>