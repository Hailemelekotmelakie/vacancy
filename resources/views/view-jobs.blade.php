<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of jobs</title>
    <style>
    .error {
        background-color: #990000;
        padding: 10px;
        margin: 10px;
    }

    .Posted {
        background-color: greenyellow;
        padding: 10px;
        margin: 10px;
    }
    </style>
    <script>
    function hideAfterDelay() {
        var t = document.getElementById('hideAfterDelay').style.display = 'none';
    }
    setTimeout('hideAfterDelay()', 5000);
    </script>
</head>

<body>
    @include('navOut')

    <!-- Job posted -->
    @if(Session::has('Posted'))
    <h4 id="hideAfterDelay" class="Posted">{{Session::get('Posted')}}</h4>
    @endif

    <!-- Job deleted  -->
    @if(Session::has('Delete'))
    <h4 id="hideAfterDelay" class="error">{{Session::get('Delete')}}</h4>
    @endif

    <!-- Job Edited -->
    @if(Session::has('Update'))
    <h4 id="hideAfterDelay" class="Posted">{{Session::get('Update')}}</h4>
    @endif

    <!-- Display Jobs -->
    @foreach($allData as $dataLists)
    <div class="anyDiv">
        <h3>{{$dataLists->id}}</h3>
        <h4>{{$dataLists->vacantType}}</h4>
        <h4>{{$dataLists->vacantName}}</h4>

        {{$dataLists->vacantImage}}<img width="90px" src="{{ Storage::URL('vacantImage/'.$dataLists->vacantImage) }}"
            alt="jobimage">


        <h4><a href="{{url('edit-job/'.$dataLists->id)}}" class="editJob">Edit</a></h4>
        <h4><a href="{{url('deleteJob/'.$dataLists->id)}}" class="editJob">Delete</a></h4>
    </div>
    @endforeach
</body>

</html>