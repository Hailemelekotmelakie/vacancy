<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Me</title>
    <link rel="stylesheet" href="{{url('css/donate.css')}}">
</head>

<body>
    @extends('layouts.navigationBarAfterLogin')
    @section('content')
    <div class="DonateMeConatainer">
        <div class="donateLeft">
            <div class="DonateMeConatainerHeader">Donate for the persistency of this project:-</div>
            <div class="DonateMeConatainerTextContainer">

                <div class="DonateMeConatainerText">
                    <li>If the site is helpful </li>
                </div>
                <div class="DonateMeConatainerText">
                    <li>If you get employed by this site</li>
                </div>
                <div class="DonateMeConatainerText">
                    <li>If you think donation is neccessay for us</li>
                </div>
            </div>
        </div>
        <div class="donateRight">
            <div class="Telebirr">Telebirr</div>
            <div class="phoneNumber">
                <input type="text" class="phoneNumberField" value="0947053537" id="myInput" readonly />
                <div class="tooltip">
                    <button class="copyButton" onclick="myFunctionCopy()" onmousein="outFunc()">
                        <span class="tooltiptext" id="myTooltip">Copy phone</span>
                        Copy
                    </button>
                </div>
                <div class="NameHailemelekot">TeleBirr Name: Hailemelekot Melakie</div>
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_snmbndsh.json"
                    background="transparent" speed="1" style="width: auto; height: 300px;" loop autoplay>
                </lottie-player>
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

            </div>
        </div>
    </div>
    @endsection
    <script>
    function myFunctionCopy() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);

        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copied: " + copyText.value;
    }

    function outFunc() {
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copy to clipboard";
    }
    </script>
</body>

</html>