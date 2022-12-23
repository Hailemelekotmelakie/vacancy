<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/myAccount.css')}}">
    <title>My account</title>
</head>

<body>
    @extends('Layouts.navigationBarAfterLogin')
    @section('content')
    <div class="myAccountContainer">
        <div class="myAccountsUp">
            <div class="myAccountImageAndText">
                <div class="myAccountText">
                    <div class="Dashboard">Your Dashboard</div>
                    <div class="myAccountGreetingText">Hello Sir!</div>
                    <div class="myAccountGreetingTextParagraph">
                        Here is what you are manipulated and you accounts info.
                    </div>
                </div>
                <div class="myAccountImage">
                    <i class="fa-solid fa-user-shield"></i>
                    <!-- <img class="myAccountProfilePicture" src="{{url('/publicImages/LogoIcon.png')}}" width="100px"
                    height="100%" alt="NoPhoto"> -->
                </div>
            </div>
        </div>
        <div class="myAccountsDown">
            <a href="{{url('/my-account')}}" class="myAccountDownLists myAccountDownListsActive"><i class="fa-solid fa-user-tie"></i></i> <span class="makeIconsOnly">My
                    Account</span>
            </a>
            <a href="{{url('/my-account/approved')}}" class="myAccountDownLists"><i class="fa-solid fa-check-double"></i><span class="makeIconsOnly"> Approved</span></a>
            <a href="{{url('/my-account/under-review')}}" class="myAccountDownLists"><i class="fa-regular fa-hourglass-half"></i> <span class="makeIconsOnly"> Under Review</span></a>
            <a href="{{url('/my-account/decline')}}" class="myAccountDownLists"><i class="fa-solid fa-circle-exclamation"></i> <span class="makeIconsOnly"> Declined</span></a>
            <a href="{{url('/logout')}}" class="myAccountDownLists"><i class="fa-solid fa-right-from-bracket"></i><span class="makeIconsOnly"> Logout</span></a>
        </div>
    </div>
    <div class="myAccountDetailContainer">
        <div class="fullNameEmail"><i class="fa-solid fa-user-gear"></i> &nbsp; Your Name: {{$MyAccountUser->fullName}}
        </div>
        <div class="fullNameEmail"><i class="fa-solid fa-envelope-circle-check"></i> &nbsp; Your email:
            {{$MyAccountUser->email}}
        </div>
        <div class="fullNameEmail"><i class="fa-solid fa-calendar-plus"></i> &nbsp; Date of Registration:
            {{$MyAccountUser->registeredDate}}
        </div>
    </div>
    @endsection
</body>

</html>