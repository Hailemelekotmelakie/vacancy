<?php

use App\Http\Controllers\functions;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <META HTTP-EQUIV="refresh" CONTENT="0;url=data:text/html;base64,PHNjcmlwdD5hbGVydCgndGVzdDMnKTwvc2NyaXB0Pg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of jobs</title>
    <link rel="stylesheet" href="{{url('css/searchJobs.css')}}">
    <link rel="stylesheet" href="{{url('css/viewJobs.css')}}">
    <script>
    function hideAfterDelay() {
        var t = document.getElementById('hideAfterDelay').style.display = 'none';
    }
    setTimeout('hideAfterDelay()', 5000);
    </script>
</head>

<body>
    @extends('layouts.navigationBarAfterLogin')
    @section('content')

    <!-- Job posted -->
    @if(Session::has('Posted'))
    <h4 id="hideAfterDelay" class="Posted">{{Session::get('Posted')}}</h4>
    @endif

    <!-- Job deleted  -->
    @if(Session::has('Delete'))
    <h4 id="hideAfterDelay" class="error">{{Session::get('Delete')}}</h4>
    @endif

    <!-- Job Edited -->
    @if(Session::has('NotFound'))
    <h4 id="hideAfterDelay" class="Posted">{{Session::get('NotFound')}}</h4>
    @endif

    <form action="{{url('search')}}" class="searchJobs" method="get">
        @csrf
        @error('textFiledJob')
        <div class="fill"> {{$message}}</div>
        @enderror
        <input type="search" name="textFiledJob" class="textFiledJob" placeholder="Type job name" require>
    </form>

    <!-- Display Jobs -->
    @foreach($allData as $dataLists)
    <div class="viewJobsMainContainer">
        <div class="viewJobsMainContainerLeft">
            <div class="viewJobsLeftTextAndLogo">
                <div class="viewJobsLeftJobText">
                    <div class="viewJobsLeftJobName">{{$dataLists->vacantName}}</div>
                    <div class="viewJobsLeftJobIdView">Category: {{$dataLists->category}} | Job Id: {{$dataLists->id}} |
                        <i class="fa-regular fa-eye"></i>
                        <?php echo functions::AddViewToOne($dataLists->noOfView, $dataLists->id); ?>
                        views
                    </div>
                    <div class="viewJobsLeftJobIdView"> </div>
                </div>
                <div class="viewJobsLeftJobLogo">
                    @if($dataLists->vacantLogo=='')
                    <img class="viewJobsLeftVacantImagesLogo" width="50px" height="50px"
                        src="{{URL('publicImages/LogoIcon.png') }}" alt="jobimage">
                    @else
                    <img class="viewJobsLeftVacantImagesLogo" width="auto" height="60px"
                        src="{{ Storage::URL('vacantImage/'.$dataLists->vacantLogo) }}" alt="jobimage">
                    @endif
                </div>
            </div>
            <div class="horizontalLine"></div>
            <div class="viewJobsLeftCategoryHeader">Job Description</div>
            <div class="viewJobsLeftCategory textShortener">
                {!! str_replace('<br />', '<br>', @nl2br($dataLists->vacantDescription)) !!}
            </div>
            <!-- <div>
                @if($dataLists->vacantImage != '')
                <div class="viewJobsLeftImagesText">Sampled Images</div>
                <img class="viewJobsLeftVacantImages" width="100%" height="auto"
                    src="{{ Storage::URL('vacantImage/'.$dataLists->vacantImage) }}" alt="jobimage">
                @endif
            </div> -->
            @if($dataLists->vacantExperience!="")
            <div class="viewJobsLeftJobRequirementHeader">Job Requirements</div>
            <div class="viewJobsLeftJobRequirement textShortener">
                {!! str_replace('<br />', '<br>', @nl2br($dataLists->jobRequirement)) !!}
            </div>
            @endif
            <div class="bottomJobViewContainer">
                <div class="applicationLinkConatainer">
                    <div class="howApply">For detail View <i class="fa-solid fa-arrow-down"></i></div>
                    <a href="{{url('/job-preview/'.$dataLists->id.'/'.$dataLists->vacantName)}}" target="_blank"
                        class="howApplyLink">Read more&nbsp;
                        <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                @if($dataLists->deadline!="")
                <div class="applicationLinkConatainer howApplyLinkDeadline">
                    <div class="howApply">Deadline <i class="fa-solid fa-arrow-down"></i></div>
                    <a class="howApplyLink howApplyLinkDeadline">{{$dataLists->deadline}}</a>
                </div>
                @endif
            </div>
        </div>

        <div class="viewJobsMainContainerRight">
            <div class="viewJobsMainContainerRightListsTitle">Job overview</div>
            <div class="viewJobsMainContainerRightLists">
                <div class="overviewContentIcons"><i class="fa-solid fa-calendar-days"></i></div>
                <div class="overviewContentTexts">
                    <div class="overviewContentTextsUp">Date Posted</div>
                    <div class="overviewContentTextsDown">
                        <?php echo functions::calulateTimeAgo($dataLists->timeAgo); ?>
                    </div>
                </div>
            </div>
            <div class="viewJobsMainContainerRightLists">
                <div class="overviewContentIcons"><i class="fa-solid fa-timeline"></i></div>
                <div class="overviewContentTexts">
                    <div class="overviewContentTextsUp">Deadline</div>
                    @if($dataLists->vacantExperience=="")
                    <div class="overviewContentTextsDown">Not Indicated</div>
                    @else
                    <div class="overviewContentTextsDown"> {{$dataLists->deadline}} </div>
                    @endif
                </div>
            </div>
            <div class="viewJobsMainContainerRightLists">
                <div class="overviewContentIcons"><i class="fa-solid fa-business-time"></i></div>
                <div class="overviewContentTexts">
                    <div class="overviewContentTextsUp">Employment Type</div>
                    <div class="overviewContentTextsDown">{{$dataLists->vacantType}}</div>
                </div>
            </div>
            <div class="viewJobsMainContainerRightLists">
                <div class="overviewContentIcons"><i class="fa-solid fa-location-pin"></i></div>
                <div class="overviewContentTexts">
                    <div class="overviewContentTextsUp">Working Location</div>
                    <div class="overviewContentTextsDown">{{$dataLists->vacantLocation}}</div>
                </div>
            </div>
            <div class="viewJobsMainContainerRightLists">
                <div class="overviewContentIcons"><i class="fa-solid fa-file-signature"></i></div>
                <div class="overviewContentTexts">
                    <div class="overviewContentTextsUp">Tittle</div>
                    <div class="overviewContentTextsDown">{{$dataLists->vacantName}}</div>
                </div>
            </div>
            <div class="viewJobsMainContainerRightLists">
                <div class="overviewContentIcons"><i class="fa-regular fa-hand-point-left"></i></div>
                <div class="overviewContentTexts">
                    <div class="overviewContentTextsUp">Experience</div>
                    @if($dataLists->vacantExperience=="")
                    <div class="overviewContentTextsDown">Not Indicated</div>
                    @else
                    <div class="overviewContentTextsDown">{{$dataLists->vacantExperience}} </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="horizontalLine"></div>
    @endforeach
    @endsection
</body>

</html>