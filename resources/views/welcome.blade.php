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
    @include('navOut')

    <div class="siteIntro">
        <div class="siteIntroLeft">
            <div class="findJobAndTalent">Find Jobs and Talents</div>
            <form action="" class="searchJobs">
                <div class="buttonAndFieldContainer">
                    <input type="text" name="textFiledJob" class="textFiledJob" placeholder="Type job name">
                    <button type="button" class="jobSearchButton">Search</button>
                </div>
            </form>
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
    </div>
</body>

</html>