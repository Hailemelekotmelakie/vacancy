<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vacantlisttable;
use App\Models\contactFormData;
use session;

class vacancyControler extends Controller
{
    public function insertJob(REQUEST $request)
    {
        $request->validate([
            'vacantName' => 'required|max:200|min:4',
            'vacantType' => 'required|max:200',
            'vacantImage' => 'nullable|image|max:10240',
            'vacantLogo' => 'nullable|image|max:10240',
            'vacantCategory' => 'required|max:200',
            'jobDescription' => 'required|max:10000',
            'jobRequirement' => 'nullable:max:8000',
            'workLocation' => 'required|max:200',
            'experience' => 'nullable|max:200',
            'registrationLink' => 'nullable|url|max:200',
            'deadline' => 'nullable',
            'salary' => 'nullable|max:20'

        ]);
        $vacantName = $request->vacantName;
        $vacantType = $request->vacantType;
        $vacantCategory = $request->vacantCategory;
        $jobDescription = $request->jobDescription;
        $salary = $request->salary;

        $jobRequirement = $request->jobRequirement;
        $workLocation = $request->workLocation;
        $experience = $request->experience;
        $registrationLink = $request->registrationLink;
        $deadline = $request->deadline;
        $vacantDate = date("l jS \of F Y h:i:s A");
        $status = 'unverified';

        $timeAgo = time();
        $noOfView = 0;
        $email = session('remotLogin');
        // Image
        if ($request->hasFile('vacantImage')) {
            $vacantImage = $timeAgo . $request->file('vacantImage')->GetClientOriginalName();
            $request->file('vacantImage')->storeAs('public/vacantImage/', $vacantImage);
        } else {
            $vacantImage = NULL;
        }
        // Logo
        if ($request->hasFile('vacantLogo')) {
            $vacantLogo = $timeAgo . $request->file('vacantLogo')->GetClientOriginalName();
            $request->file('vacantLogo')->storeAs('public/vacantImage/', $vacantLogo);
        } else {
            $vacantLogo = NULL;
        }
        $ModelObject = new vacantlisttable();

        $ModelObject->vacantName = $vacantName;
        $ModelObject->vacantType = $vacantType;
        $ModelObject->category = $vacantCategory;
        $ModelObject->vacantDescription = $jobDescription;
        $ModelObject->salary = $salary;

        $ModelObject->jobRequirement = $jobRequirement;
        $ModelObject->vacantLocation = $workLocation;
        $ModelObject->vacantExperience = $experience;
        $ModelObject->applicatioLink = $registrationLink;
        $ModelObject->deadline = $deadline;
        $ModelObject->vacantDate = $vacantDate;

        $ModelObject->timeAgo = $timeAgo;
        $ModelObject->status = $status;
        $ModelObject->vacantImage = $vacantImage;
        $ModelObject->vacantLogo = $vacantLogo;
        $ModelObject->noOfView = $noOfView;
        $ModelObject->email = $email;
        $ModelObject->save();

        return redirect('view-jobs')->with('Posted', 'Job posted successfully');
        // return $vacantImage;
    }

    public function postingPage()
    {
        return view('afterLogin.post-job');
    }

    public function veiwJobLists()
    {
        $allData = vacantlisttable::get();
        if (session()->has('loginId')) {
            return view('afterLogin.view-jobs', compact('allData'));
        } else {
            return view('beforeLogin.view-jobs', compact('allData'));
        }
    }

    public function editJob($id)
    {
        $dataGonnaEdit = vacantlisttable::where('id', '=', $id)->first();
        return view('afterLogin.auth.edit-job', compact('dataGonnaEdit'));
    }

    public function goForEdition(REQUEST $request)
    {
        $request->validate([
            'vacantName' => 'required|max:400|min:4',
            'vacantType' => 'required',
            'vacantImageEdit' => 'required'

        ]);
        $id = $request->id;
        $vacantName = $request->vacantName;
        $vacantType = $request->vacantType;
        $timeAgo = time();
        $vacantImage = $timeAgo . $request->file('vacantImageEdit')->GetClientOriginalName();
        $request->file('vacantImageEdit')->storeAs('public/vacantImage/', $vacantImage);

        vacantlisttable::where('id', '=', $id)->update([
            'vacantName' => $vacantName,
            'vacantType' => $vacantType,
            'vacantImage' => $vacantImage

        ]);
        return redirect('/my-account/under-review')->with('Update', 'Updated Successfully');
    }

    public function deleteJob($id)
    {
        vacantlisttable::where('id', '=', $id)->delete();
        return back()->with('Delete', 'Deleted successfully');
    }

    public function welcome()
    {
        $data = vacantlisttable::inRandomOrder()->limit(2)->get();
        if (session()->has('loginId')) {
            return view('afterLogin.welcome', compact('data'));
        } else {
            return view('beforeLogin.welcome', compact('data'));
        }
    }

    public function donation()
    {
        if (session()->has('loginId')) {
            return view('afterLogin.donation');
        } else {
            return view('beforeLogin.donation');
        }
    }


    public function search(Request $request)
    {
        $request->validate([
            'textFiledJob' => 'required'
        ]);
        // $searchWord = $request->search;
        $textFiledJob = $_GET['textFiledJob'];

        // vacantlisttable::where('id', '=', $id)->delete();
        $products = vacantlisttable::where('vacantName', 'LIKE', '%' . $textFiledJob . '%')->get();
        $row = $products->count();


        if (session()->has('loginId')) {
            if (!empty($row)) {
                return view('afterLogin.search-job', compact('products'));
            } else {
                return redirect('view-jobs')->with('NotFound', 'Search not found');
            }
        } else {
            if (!empty($row)) {
                return view('beforeLogin.search-job', compact('products'));
            } else {
                return redirect('/view-jobs')->with('NotFound', 'Search not found');
            }
        }
    }

    public function contactFormsData(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|required|max:100',
            'phoneNo' => 'digits_between:10,14',
            'message' => 'required|max:300|min:5'
        ]);
        $name = $request->name;
        $email = $request->email;
        $phoneNo = $request->phoneNo;
        $message = $request->message;
        $timeAgo = time();
        $date = date("l jS \of F Y ");

        $newContactFormData = new ContactFormData();
        $newContactFormData->name = $name;
        $newContactFormData->email = $email;
        $newContactFormData->phoneNo = $phoneNo;
        $newContactFormData->message = $message;
        $newContactFormData->timeAgo = $timeAgo;
        $newContactFormData->date = $date;
        $newContactFormData->save();

        return back()->with('success', 'We respond you soon via email shortly!!! Thank you!!!');
    }


    public function about()
    {
        if (session()->has('loginId')) {
            return view('afterLogin.about-us');
        } else {
            return view('beforelogin.about-us');
        }
    }

    public function contact()
    {
        if (session()->has('loginId')) {
            return view('afterLogin.contact-us');
        } else {
            return view('beforelogin.contact-us');
        }
    }

    public function privacyPolicy()
    {
        if (session()->has('loginId')) {
            return view('afterLogin.privacy-policy');
        } else {
            return view('beforeLogin.privacy-policy');
        }
    }
}