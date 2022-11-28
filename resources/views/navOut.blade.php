<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/navStyle.css')}}">
</head>

<body>
    <div class="navLinkContainer">
        <div class="navLinkContainerLeft">
            <img src="{{url('publicImages/LogoIcon.png')}}" alt="Logo" class="logoImage">
        </div>
        <div onclick="myFunction()" class="menuMakerDivContainer">
            <div class="menuMakerDiv"></div>
            <div class="menuMakerDiv"></div>
            <div class="menuMakerDiv"></div>
        </div>
        <div id="togler" class="navLinkContainerRight">
            <div class="navLinkContainerRightLinks ">
                <a class="navLinkContainerRightEachLink" href="{{url('/')}}">Home</a>
            </div>
            <div class="navLinkContainerRightLinks">
                <a class="navLinkContainerRightEachLink" href="{{url('/view-jobs')}}">View Job</a>
            </div>
            <div class="navLinkContainerRightLinks">
                <a class="navLinkContainerRightEachLink" href="{{url('/Search-jobs')}}">Search Jobs</a>
            </div>
            <div class="navLinkContainerRightLinks">
                <a class="navLinkContainerRightEachLink" href="{{url('/post-job')}}">Post Job</a>
            </div>
            <div class="navLinkContainerRightLinks">
                <a class="" href="{{url('/donation')}}">
                    <button class="donation">Donation</button>
                </a>
            </div>
            <div class="">
                <a class="" href="{{url('/donation')}}">
                    <button class="LoginSignup">Login/Signup</button>
                </a>
            </div>
        </div>

    </div>
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>

    <script>
    const currentLocation = location.href;
    var lists = document.querySelectorAll('.navLinkContainerRightEachLink');
    for (var i = 0; i < lists.length; i++) {
        if (lists[i].href === currentLocation) {
            lists[i].classList.add('navLinkActive');

        }
    }
    </script>

    <script>
    function myFunction() {
        var x = document.getElementById("togler");
        if (x.style.left == "0%") {
            x.style.left = '-200%';
        } else {
            x.style.left = '0%';
        }
    }
    </script>

    <script>
    // When the user scrolls the page, execute myFunctionNew 
    window.onscroll = function() {
        myFunctionNew()
    };

    function myFunctionNew() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }
    </script>
</body>

</html>