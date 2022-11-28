<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('app.css') }}">

    <title>Post job</title>
</head>

<body>
    @include('navOut')

    <form class="anyDiv" method="POST" enctype="multipart/form-data" action="{{url('insertJob')}}">
        @csrf
        <input type="text" name="vacantName" placeholder="Enter job title" value="{{old('vacantName')}}">
        @error('vacantName')
        <div class="error"> {{$message}}</div>
        @else
        <div>Please fill your name here</div>
        @enderror
        <input type="text" name="vacantType" placeholder="Enter job type" value="{{old('vacantType')}}">
        @error('vacantType')
        <div class="error"> {{$message}}</div>
        @else
        <div>Please fill your job type</div>
        @enderror
        <input type="file" name="vacantImage" value="{{old('vacantImage')}}">
        @error('vacantImage')
        <div class="error"> {{$message}}</div>
        @else
        <div>Please fill your job type</div>
        @enderror
        <button type="submit" name="submitJob">Submit</button>
    </form>
</body>

</html>