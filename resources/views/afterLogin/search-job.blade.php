<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search job</title>
    <link rel="stylesheet" href="{{url('css/search.css')}}">
</head>

<body>
    @extends('layouts.navigationBarAfterLogin')
    @section('content')
    <form action="{{url('search')}}" method="GET">
        @csrf
        <input type="search" name="textFiledJob" class="inputSearchBar" placeholder="Search..">
    </form>
    <div class="searchedJobContainer">
        <div class="searchedJobContainerLeft">
            @foreach ($products as $product)
            <div class="innerSearchedJobContainer">
                <div class="innerSearchedJobContentContainer">
                    <div class="innerSearchedJobContentContainerLeft">
                        <div>{{$product->vacantName}}</div>
                        <div>{{$product->vacantType}}</div>
                        <div>{{$product->vacantName}}</div>
                        <div>{{$product->vacantType}}</div>
                        <div>{{$product->vacantName}}</div>
                        <div>{{$product->vacantType}}</div>
                        <div>{{$product->vacantName}}</div>
                        <div>{{$product->vacantType}}</div>
                        <div>{{$product->vacantName}}</div>
                        <div>{{$product->vacantType}}</div>
                        <div>{{$product->vacantName}}</div>
                        <div>{{$product->vacantType}}</div>
                        <div>{{$product->vacantType}}</div>
                    </div>
                    <div class="innerSearchedJobContentContainerRight">
                        <img class="innerSearchedJobContentContainerRightImage" width="460" height="auto"
                            src="{{ Storage::URL('vacantImage/'.$product->vacantImage) }}" alt="jobimage">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="searchedJobContainerRight">Right</div>
    </div>
    @endsection
</body>

</html>