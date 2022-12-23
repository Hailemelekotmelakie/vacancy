<?php

use App\Http\Controllers\functions;

?>
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
    @extends('layouts.navigationBarAfterLogin')
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
                    <img class="myAccountProfilePicture" src="{{url('/publicImages/LogoIcon.png')}}" width="100px"
                        height="100%" alt="NoPhoto">
                </div>
            </div>
        </div>
        <div class="myAccountsDown">
            <a href="{{url('/my-account')}}" class="myAccountDownLists"><i class="fa-solid fa-user-tie"></i></i>
                <span class="makeIconsOnly"> My Account</span>
            </a>
            <a href="{{url('/my-account/approved')}}" class="myAccountDownLists"><i
                    class="fa-solid fa-check-double"></i><span class="makeIconsOnly">Approved</span></a>
            <a href="{{url('/my-account/under-review')}}" class="myAccountDownLists"><i
                    class="fa-regular fa-hourglass-half"></i><span class="makeIconsOnly"> Under Review</span></a>
            <a href="{{url('/my-account/decline')}}" class="myAccountDownLists myAccountDownListsActive"><i
                    class="fa-solid fa-circle-exclamation"></i><span class="makeIconsOnly"> Declined</span></a>
            <a href="{{url('/logout')}}" class="myAccountDownLists"><i class="fa-solid fa-right-from-bracket"></i><span
                    class="makeIconsOnly">Logout</span></a>
        </div>
    </div>

    <div class="viewAuthPostProgressContainer">
        <div class="lotieFilesContainer">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player class="lotieFiles" src="https://assets4.lottiefiles.com/packages/lf20_f1cFsO.json"
                background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        </div>
        <div class="carContainerOuter">
            <div class="viewJobsLeftJobName">Here are declined jobs</div>
            @foreach( $declined as $eachList )
            <div class="jobsCardContainer">
                <div class="viewJobsLeftTextAndLogo">
                    <div class="viewJobsLeftJobText">
                        <div class="viewJobsLeftJobName">{{$eachList->vacantName}}</div>
                        <div class="viewJobsLeftJobIdView">
                            Category: {{$eachList->category}} | Job Id: {{$eachList->id}}
                        </div>
                    </div>
                    <div class="viewJobsLeftJobLogo">
                        @if($eachList->vacantLogo=='')
                        <img class="viewJobsLeftVacantImagesLogo" width="60px" height="60px"
                            src="{{URL('publicImages/LogoIcon.png') }}" alt="jobimage">
                        @else
                        <img class="viewJobsLeftVacantImagesLogo" width="auto" height="60px"
                            src="{{ Storage::URL('vacantImage/'.$eachList->vacantLogo) }}" alt="jobimage">
                        @endif
                    </div>
                </div>
                <div class="jobDescriptionHeader">Job Description</div>
                <p class="viewJobsLeftCategory">
                    {!! str_replace('<br />', '<br>', @nl2br($eachList->vacantDescription)) !!}
                </p>

                <div class="viewJobsMainContainerRight">
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-solid fa-calendar-days"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Date Posted</div>
                            <div class="overviewContentTextsDown">
                                <?php echo functions::calulateTimeAgo($eachList->timeAgo); ?>
                            </div>
                        </div>
                    </div>
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-solid fa-timeline"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Deadline</div>
                            @if($eachList->vacantExperience=="")
                            <div class="overviewContentTextsDown">Not Indicated</div>
                            @else
                            <div class="overviewContentTextsDown"> {{$eachList->deadline}} </div>
                            @endif
                        </div>
                    </div>
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-solid fa-business-time"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Employment Type</div>
                            <div class="overviewContentTextsDown">{{$eachList->vacantType}}</div>
                        </div>
                    </div>
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-solid fa-location-pin"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Working Location</div>
                            <div class="overviewContentTextsDown">{{$eachList->vacantLocation}}</div>
                        </div>
                    </div>
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-regular fa-hand-point-left"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Experience</div>
                            @if($eachList->vacantExperience=="")
                            <div class="overviewContentTextsDown">Not Indicated</div>
                            @else
                            <div class="overviewContentTextsDown"> {{$eachList->vacantExperience}} </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="jobCardButtons">
                    <!-- <h4><a href="{{url('edit-job/'.$eachList->id)}}" class="editJob"><i
                                class="fa-solid fa-pen-to-square"></i></a></h4>
                    <h4><a href="{{url('job-preview/'.$eachList->id.'/'.$eachList->vacantName)}}" class="editJob">
                            <i class="fa-solid fa-up-right-from-square"></i></a></h4> -->
                    <h4><a href="{{url('deleteJob/'.$eachList->id)}}" class="deleteJob"><i
                                class="fa-solid fa-trash"></i></a></h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- <div class="DeclinedJobs">
        @foreach( $declined as $eachList )
        <div class="DeclinedJobsList">{{$eachList->vacantName}}</div>
        <div class="DeclinedJobsList">{{$eachList->category}}</div>
        <div class="DeclinedJobsList">{{$eachList->id}}</div>
        @endforeach
    </div> -->

    <!-- <div>
        @if($closed != '[]')
        @foreach($closed as $eachList)
        {{$eachList->vacantName}}
        {{$eachList->category}}
        {{$eachList->id}}
        @endforeach
        @else
        <h2>no Jobs Approved</h2>
        @endif
    </div> -->
    <div class="viewAuthPostProgressContainer">
        <div class="lotieFilesContainer">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player class="lotieFiles" src="https://assets6.lottiefiles.com/private_files/lf30_af5dqzoa.json"
                background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        </div>
        <div class="carContainerOuter">
            <div class="viewJobsLeftJobName">Here are closed jobs</div>
            @foreach( $closed as $eachList )
            <div class="jobsCardContainer">
                <div class="viewJobsLeftTextAndLogo">
                    <div class="viewJobsLeftJobText">
                        <div class="viewJobsLeftJobName">{{$eachList->vacantName}}</div>
                        <div class="viewJobsLeftJobIdView">
                            Category: {{$eachList->category}} | Job Id: {{$eachList->id}}
                        </div>
                    </div>
                    <div class="viewJobsLeftJobLogo">
                        @if($eachList->vacantLogo=='')
                        <img class="viewJobsLeftVacantImagesLogo" width="60px" height="60px"
                            src="{{URL('publicImages/LogoIcon.png') }}" alt="jobimage">
                        @else
                        <img class="viewJobsLeftVacantImagesLogo" width="auto" height="60px"
                            src="{{ Storage::URL('vacantImage/'.$eachList->vacantLogo) }}" alt="jobimage">
                        @endif
                    </div>
                </div>
                <div class="jobDescriptionHeader">Job Description</div>
                <p class="viewJobsLeftCategory">
                    {!! str_replace('<br />', '<br>', @nl2br($eachList->vacantDescription)) !!}
                </p>

                <div class="viewJobsMainContainerRight">
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-solid fa-calendar-days"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Date Posted</div>
                            <div class="overviewContentTextsDown">
                                <?php echo functions::calulateTimeAgo($eachList->timeAgo); ?>
                            </div>
                        </div>
                    </div>
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-solid fa-timeline"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Deadline</div>
                            @if($eachList->vacantExperience=="")
                            <div class="overviewContentTextsDown">Not Indicated</div>
                            @else
                            <div class="overviewContentTextsDown"> {{$eachList->deadline}} </div>
                            @endif
                        </div>
                    </div>
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-solid fa-business-time"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Employment Type</div>
                            <div class="overviewContentTextsDown">{{$eachList->vacantType}}</div>
                        </div>
                    </div>
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-solid fa-location-pin"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Working Location</div>
                            <div class="overviewContentTextsDown">{{$eachList->vacantLocation}}</div>
                        </div>
                    </div>
                    <div class="viewJobsMainContainerRightLists">
                        <div class="overviewContentIcons"><i class="fa-regular fa-hand-point-left"></i></div>
                        <div class="overviewContentTexts">
                            <div class="overviewContentTextsUp">Experience</div>
                            @if($eachList->vacantExperience=="")
                            <div class="overviewContentTextsDown">Not Indicated</div>
                            @else
                            <div class="overviewContentTextsDown"> {{$eachList->vacantExperience}} </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="jobCardButtons">
                    <!-- <h4><a href="{{url('edit-job/'.$eachList->id)}}" class="editJob"><i
                                class="fa-solid fa-pen-to-square"></i></a></h4>
                    <h4><a href="{{url('edit-job/'.$eachList->id)}}" class="editJob">
                            <i class="fa-solid fa-up-right-from-square"></i></a></h4> -->
                    <h4><a href="{{url('deleteJob/'.$eachList->id)}}" class="deleteJob"><i
                                class="fa-solid fa-trash"></i></a></h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>

    @endsection

</body>

</html>