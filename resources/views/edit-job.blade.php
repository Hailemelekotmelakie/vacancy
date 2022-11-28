<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{url('app.css') }}"> -->
    <title>Edit job</title>
</head>

<body>
    @include('navOut')

    <form method="POST" action="{{url('goForEdition')}}" class="anyDiv" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$dataGonnaEdit->id}}">
        <input type="text" name="vacantName" value="{{$dataGonnaEdit->vacantName}}">
        @error('vacantName')
        <div class="error"> {{$message}}</div>
        @else
        <div>Please fill your job type</div>
        @enderror
        <input type="text" name="vacantType" value="{{$dataGonnaEdit->vacantType}}">
        @error('vacantType')
        <div class="error"> {{$message}}</div>
        @else
        <div>Please fill your job type</div>
        @enderror
        <input type="file" name="vacantImageEdit" value="{{$dataGonnaEdit->vacantType}}">
        @error('vacantImageEdit')
        <div class="error"> {{$message}}</div>
        @else
        <div>Please fill your job type</div>
        @enderror
        <button type="submit">Update</button>
    </form>

</body>

</html>