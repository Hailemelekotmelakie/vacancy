<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{url('css/homepageSiteIntro.css')}}">

    <title>See job lists</title>
</head>

<body>
    @extends('layouts.navigationBar')
    @section('content')
    <div class="siteIntro">
        <div class="siteIntroLeft">
            <div class="findJobAndTalent">Find Jobs and Talents</div>
            <div class="buttonAndFieldContainer">

                <form action="{{url('search')}}" class="searchJobs" method="get">
                    @csrf
                    <input type="text" name="textFiledJob" class="textFiledJob" placeholder="Type job name" require>
                    <input type="submit" class="jobSearchButton" value="Search">
                </form>
            </div>

            <div class="fiveHundred1">
                Companies can post open job advertisements through our website free of charge!
            </div>
            <div class="fiveHundred">
                <span class="greenFiveHundred">Keep up to date</span> for more than 200+ open job announcements per
                week.
            </div>
        </div>
        <div class="siteIntroRight">
            <img src="{{url('publicImages/job-proposal-review-animation.gif')}}" alt="Image"
                class="siteIntroRightImage">
        </div>
    </div>
    <div class="showRandomSampleJobs">
        <div class="showRandomSampleJobsLeft">
            @foreach($data as $ret)
            <div class="showRandomSampleJobsLeftConatainer">
                <div class="showRandomSampleJobsLeftUp">
                    <div class="showRandomSampleJobsLeftUpText">{{$ret->vacantName}}</div>
                    <div class="showRandomSampleJobsLeftUpImageContainer">
                        <img class="showRandomSampleJobsLeftUpImage" width="90px"
                            src="{{ Storage::URL('vacantImage/'.$ret->vacantImage) }}" alt="jobimage">
                    </div>
                </div>
                <div class="showRandomSampleJobsLeftDown">{{$ret->vacantType}}</div>
            </div>
            @endforeach
        </div>
        <div class="showRandomSampleJobsRight">Right</div>
    </div>
    @endsection
</body>

</html>