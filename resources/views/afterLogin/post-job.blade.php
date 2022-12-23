<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('app.css') }}">
    <link rel="stylesheet" href="{{url('./css/postJob.css')}}">
    <title>Post job</title>
</head>

<body>
    @extends('layouts.navigationBarAfterLogin')
    @section('content')
    <div>
        <a href="{{url('logout')}}">Logout</a>
    </div>
    <div class="postJob">
        <div class="postJobHeader">Post job</div>
        <form class="theForm" method="POST" enctype="multipart/form-data" action="{{url('insertJob')}}">
            @csrf
            <!-- job Catagory -->
            @error('vacantType')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Job category<span class="requiredField"> *</span></div>
            @enderror
            <select name="vacantCategory" value="{{old('vacantCategory')}}">
                <option value="">Select job category</option>
                <option value="Bank" @if (old('vacantCategory')=="Bank" ) {{ 'selected' }} @endif>Bank</option>
                <option value="NGO" @if (old('vacantCategory')=="NGO" ) {{ 'selected' }} @endif>NGO</option>
                <option value="Software" @if (old('vacantCategory')=='Software' ) {{ 'selected' }} @endif>Software
                </option>
                <option value="Health" @if (old('vacantCategory')=="Health" ) {{ 'selected' }} @endif>Health
                </option>
                <option value="Other" @if (old('vacantCategory')=="Other" ) {{ 'selected' }} @endif>Other</option>
            </select>
            <!-- job name -->
            @error('vacantName')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Name of job <span class="requiredField"> *</span></div>
            @enderror
            <input type="text" name="vacantName" placeholder="Job Title" value="{{old('vacantName')}}">
            <!-- job Type -->
            @error('vacantType')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Job type<span class="requiredField"> *</span></div>
            @enderror
            <select name="vacantType" value="{{old('vacantType')}}">
                <option value="">Select employment type</option>
                <option value="Contract" @if (old('vacantType')=="Contract" ) {{ 'selected' }} @endif>Contract</option>
                <option value="Full-time" @if (old('vacantType')=="Full-time" ) {{ 'selected' }} @endif>Full-time
                </option>
                <option value="Part-time" @if (old('vacantType')=='Part-time' ) {{ 'selected' }} @endif>Part-time
                </option>
                <option value="Internship" @if (old('vacantType')=="Internship" ) {{ 'selected' }} @endif>Internship
                </option>
            </select>
            <!-- work Location -->
            @error('workLocation')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Work location<span class="requiredField"> *</span></div>
            @enderror
            <input type="text" name="workLocation" placeholder="Work Location" value="{{old('workLocation')}}">
            <!-- job Description-->
            @error('jobDescription')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Job description<span class="requiredField"> *</span></div>
            @enderror
            <textarea name="jobDescription" placeholder="Job description">{{old('jobDescription')}}</textarea>
            <!-- job Requirement -->
            @error('jobRequirement')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Job requirement <span class="optionalField">(optional)</span></div>
            @enderror
            <textarea name="jobRequirement" placeholder="Job requirement">{{old('jobRequirement')}}</textarea>
            <!-- Experience -->
            @error('experience')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Year of experience <span class="optionalField">(optional)</span></div>
            @enderror
            <input type="text" name="experience" placeholder="Work experience" value="{{old('experience')}}">
            <!-- salary -->
            @error('salary')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Salary <span class="optionalField">(optional)</span></div>
            @enderror
            <input type="text" name="salary" placeholder="Salary" value="{{old('salary')}}">
            <!-- Registration Link -->
            @error('registrationLink')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Registration link <span class="optionalField">(optional)</span></div>
            @enderror
            <input type="url" name="registrationLink" placeholder="Registration link if any"
                value="{{old('registrationLink')}}">
            <!-- deadline -->
            @error('deadline')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Deadline <span class="optionalField">(optional)</span></div>
            @enderror
            <input type="date" name="deadline" placeholder="Deadline" value="{{old('deadline')}}">
            <!-- Logo -->
            @error('vacantLogo')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Company logo <span class="optionalField">(optional)</span></div>
            @enderror


            <label class="labelInputFile" for="vacantLogo">
                <img id="previewLogo" width="60px" height="60px" src="https://via.placeholder.com/400x400.png?text=LOGO"
                    style="pointer-events: none" alt="LogoPreview" />

            </label>
            <input id="vacantLogo" class="inputFile" type="file" name="vacantLogo" value="{{old('vacantLogo')}}"
                accept="image/png, image/jpeg" />
            <script>
            vacantLogo.onchange = evt => {
                const [file] = vacantLogo.files
                if (file) {
                    previewLogo.src = URL.createObjectURL(file)
                }
            }
            </script>

            <!-- images -->
            @error('vacantImage')
            <div class="error"> {{$message}}</div>
            @else
            <div class="normal">Photo <span class="optionalField">(optional)</span></div>
            @enderror
            <label class="labelInputFile" for="vacantImage">
                <img id="previewImage" width="100px" height="60px"
                    src="https://via.placeholder.com/300x300.png?text=PHOTO" style="pointer-events: none"
                    alt="ImagePreview" />

            </label>
            <input id="vacantImage" class="inputFile" type="file" name="vacantImage" value="{{old('vacantImage')}}"
                accept="image/png, image/jpeg" />
            <script>
            vacantImage.onchange = evt => {
                const [file] = vacantImage.files
                if (file) {
                    previewImage.src = URL.createObjectURL(file)
                }
            }
            </script>

            <div class="submitJobButtonContainer">
                <button class="submitJobButton" type="submit" name="submitJob">Submit</button>
            </div>
        </form>
    </div>
    @endsection
</body>

</html>