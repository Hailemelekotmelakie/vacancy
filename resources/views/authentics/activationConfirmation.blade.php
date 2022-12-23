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
                    <form method="get" action="{{url('login')}}" class="login">
                        @csrf
                        <div class="pass-link">
                            <h4 class="field">we have sent a activation link to
                                {{Session('email')}}.
                            </h4>
                            <h4 class="field">Please click the activation link that you have in your email</h4>
                        </div>

                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>