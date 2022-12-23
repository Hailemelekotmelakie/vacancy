<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{url('/css/navigationBar.css')}}">
</head>

<body>
    <header id="navbar">
        <nav class="navbar-container container">
            <a href="/" class="home-link">
                <img height="auto" width="20px" src="{{url('publicImages/LogoIcon.png')}}" alt="logo" class="logoImage">
                ETHIOPIA
            </a>
            <button type="button" class="navbar-toggle" aria-label="Toggle menu" aria-expanded="false"
                aria-controls="navbar-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="navbar-menu" class="detached">
                <ul class="navbar-links">
                    <li class="navbar-item"><a class="navbar-link" href="{{url('/')}}">Home</a></li>
                    <li class="navbar-item"><a class="navbar-link" href="{{url('/view-jobs')}}">View Job</a></li>
                    <li class="navbar-item"><a class="navbar-link" href="{{url('/post-job')}}">Post Job</a></li>
                    <!-- <li class="navbar-item"><a class="navbar-link" href="{{url('/about')}}"> about </a></li> -->
                    <div class="navbar-item">
                        <a class="" href="{{url('/donation')}}">
                            <button class="donation">Donation</button>
                        </a>
                    </div>
                    <div class="navbar-item">
                        <a class="" href="{{url('/contact')}}">
                            <button class="LoginSignup">Contact</button>
                        </a>
                    </div>
                    <div class="navbar-item">
                        <a class="" href="{{url('/my-account')}}">
                            <button class="LoginSignup">Account</button>
                        </a>
                    </div>
                </ul>
            </div>
        </nav>
    </header>

    <script>
    const currentLocation = location.href;
    var lists = document.querySelectorAll('.navbar-link');
    for (var i = 0; i < lists.length; i++) {
        if (lists[i].href === currentLocation) {
            lists[i].classList.add('active');
        }
    }
    </script>
    <script type="text/javascript" src="{{ url('/js/navigationBar.js') }}"></script>

    @yield('content')

    @extends('layouts.footerAfterLogin')
    @section('footerAfterLogin')
    @endsection

</body>

</html>