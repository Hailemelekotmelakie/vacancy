<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Set new password</title>
    <link rel="stylesheet" href="{{url('/css/login-signup.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @extends('layouts.navigationBar')
    @section('content')
    <div class="upperWrapper">
        <div class="wrapper">
            <div class="title-text">
                <div class="title signup">Set new password</div>
            </div>
            <div class="form-container">
                <div class="form-inner">
                    <form action="{{url('/putNewPassword')}}" method="post" class="signup">
                        @csrf
                        <div class="field">
                            <input type="password" name="password" placeholder="New password"
                                value="{{old('password')}}" required>
                            @error('password')
                            <span class="validationError"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="password" name="passwordConfirmation" placeholder="Confirm new password"
                                required>
                        </div>
                        <div class="pass-link">
                            @error('passwordConfirmation')
                            <span class="validationError"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Set new password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>