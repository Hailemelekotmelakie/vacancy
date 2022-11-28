<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vacantlisttable;

class vacancyControler extends Controller
{
    public function insertJob(REQUEST $request)
    {
        $request->validate([
            'vacantName' => 'required|unique:vacantlisttables|max:400|min:4',
            'vacantType' => 'required|max:70|min:4',
            'vacantImage' => 'required'

        ]);
        $vacantName = $request->vacantName;
        $vacantType = $request->vacantType;
        $timeAgo = time();
        $vacantImage = $timeAgo . $request->file('vacantImage')->GetClientOriginalName();
        $request->file('vacantImage')->storeAs('public/vacantImage/', $vacantImage);

        $ModelObject = new vacantlisttable();

        $ModelObject->vacantName = $vacantName;
        $ModelObject->vacantType = $vacantType;
        $ModelObject->vacantImage = $vacantImage;
        $ModelObject->save();

        return redirect('view-jobs')->with('Posted', 'Job posted successfully');
        return $vacantImage;
    }

    public function postingPage()
    {
        return view('post-job');
    }

    public function veiwJobLists()
    {
        $allData = vacantlisttable::get();
        return view('view-jobs', compact('allData'));
    }

    public function editJob($id)
    {
        $dataGonnaEdit = vacantlisttable::where('id', '=', $id)->first();
        return view('edit-job', compact('dataGonnaEdit'));
    }

    public function goForEdition(REQUEST $request)
    {
        $request->validate([
            'vacantName' => 'required|max:400|min:4',
            'vacantType' => 'required|max:70|min:4',
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
        $id = $request->id;
        return redirect('view-jobs')->with('Update', 'Updated Successfully');
    }

    public function deleteJob($id)
    {
        vacantlisttable::where('id', '=', $id)->delete();
        return back()->with('Delete', 'Deleted successfully');
    }
}
