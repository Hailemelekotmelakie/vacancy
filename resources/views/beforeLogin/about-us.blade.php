<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/about.css')}}">
    <title>about us</title>
</head>

<body>
    @extends('layouts.navigationBar')
    @section('content')
    <div class="about">
        <div class="aboutVacantHeader">
            About Us
        </div>
        <div class="aboutVacantText">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.
        </div>
    </div>
    <div class="about">
        <div class="aboutVacantHeader">
            Our Technology
        </div>
        <div class="aboutVacantText">
            Our code generation engine enables API providers to generate SDKs for their APIs within minutes and at a
            fraction of the cost. We provide tools like our API editor and API transformer to further aid API providers
            in minimizing the time required to ship excellent quality SDKs to the developers using their APIs. Our code
            generation engine is also capable of generating succinct and error-free documentation for APIs and SDKs,
            both. The documentation for the SDKs includes dynamic screenshots detailing usage instructions tailored to
            the provider's specific API and also code snippets showing example usage. As the cherry on the cake, we
            provide beautifully designed DX portals to encapsulate this documentation.
        </div>
    </div>
    <div class="about">
        <div class="aboutVacantHeader">
            Original Story
        </div>
        <div class="aboutVacantText">
            <div class="aboutParagraph"> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
                recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
            <div class="aboutVacantText"> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
                recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
            <div class="aboutVacantText">After a rigorous journey, this research project was selected as a candidate for
                commercialization by
                Return
                on Science (a NZ national research commercialization program focused on bringing new academic research
                to
                market) and the concept was transformed into a product i.e. APIMatic.</div>
        </div>
    </div>
    @endsection
</body>

</html>