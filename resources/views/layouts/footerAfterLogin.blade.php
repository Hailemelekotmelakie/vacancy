<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/footer.css')}}">
    <title>Footer</title>
</head>

<body>
    @yield('footerAfterLogin')
    <div class="footer">
        <div class="footerContainer">
            <div class="footerLeft">
                <div class="footerLeftHeader">About</div>
                <div class="footerLeftText"> <a href="https://vacancy.huliesira.com"
                        class="vacancyhulisiracom">vacancy.hulisira.com</a> is an initiative to announce the upcoming
                    job events. We focuses on providing small jobs to the most efficient Job vacant spaces all over
                    Ethiopia.
                    Besides, We will help programmers build up concepts in different programming
                    languages that include HTML, CSS, JavaScript, PHP, Laravel, Reactjs, ExpressJs, NodeJs, SQL, MYSQL,
                    mongoDB and in addition we are working web development.
                </div>
            </div>
            <div class="footerMiddleAndRightContainer">
                <div class="footerMiddle">
                    <div class="footerMiddleHeader">Category</div>
                    <div class="footerMiddleText">Software development</div>
                    <div class="footerMiddleText">Banks</div>
                    <div class="footerMiddleText">NGO</div>
                    <div class="footerMiddleText">Others</div>
                </div>
                <div class="footerRight">
                    <div class="footerRightHeader">Quick Links</div>
                    <div class="footerRightText"> <a class="footerRightText" href="{{url('about')}}">About Us</a></div>
                    <div class="footerRightText"> <a class="footerRightText" href="{{url('contact')}}">Contact Us</a>
                    </div>
                    <div class="footerRightText"><a class="footerRightText" href="{{url('donation')}}"> Contribute</a>
                    </div>
                    <div class="footerRightText"> <a class="footerRightText" href="{{url('privacy-policy')}}"> Privacy
                            Policy</a></div>
                </div>
            </div>
        </div>
        <div class="horizontalLine"></div>
        <div class="copywriteAndSocialmedia">
            <div class="copywrite">
                Copyright © 2022-2023 All Rights Reserved by <a target="_blank" href="https://portfolio.huliesira.com"
                    class="vacancyhulisiracom">Hailemelekot</a>
            </div>
            <div class="socialmedia">
                <a href="mailto:hailemelekotmelakie1991@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                <a href="tel:+251947053537"><i class="fa-solid fa-phone"></i></a>
                <a href=""><i class="fa-brands fa-linkedin"></i></a>
                <a href=""><i class="fa-brands fa-telegram"></i></a>
                <a href=""><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </div>
    </div>
</body>

</html>