<?php

namespace App\Http\Controllers;

use App\Models\UsersList;
use App\Models\vacantlisttable;

use Illuminate\Http\Request;

class myAccountController extends Controller
{
    public function myAccount()
    {
        $MyAccountUser = UsersList::where('email', session('remotLogin'))->first();
        return view('afterLogin.auth.my-account', compact('MyAccountUser'));
    }

    public function underReview()
    {
        $underReview = vacantlisttable::where([
            ['email', '=', session('remotLogin')],
            ['status', '=', 'unverified']
        ])->get();
        return view('afterLogin.auth.under-review', compact('underReview'));
    }

    public function decline()
    {
        $declined = vacantlisttable::where([
            ['email', '=', session('remotLogin')],
            ['status', '=', 'declined']
        ])->get();

        $closed = vacantlisttable::where([
            ['email', '=', session('remotLogin')],
            ['status', '=', 'closed']
        ])->get();
        return view('afterLogin.auth.decline', compact('declined', 'closed'));
    }

    public function approved()
    {
        $approved = vacantlisttable::where([
            ['email', '=', session('remotLogin')],
            ['status', '=', 'approved']
        ])->get();
        return view('afterLogin.auth.approved', compact('approved'));
    }
    public function closeJob($jobId)
    {
        vacantlisttable::where([
            ['email', '=', session('remotLogin')],
            ['id', '=', $jobId]
        ])->update([
            'status' => 'closed'
        ]);

        return redirect('/my-account/approved')->with('closed', 'Job Closed Successfully');
    }

    public function preview($id, $vacantName)
    {
        $preview =  vacantlisttable::where('id', '=', $id)->get();
        $recent = vacantlisttable::where('status', '=', 'approved')
            ->orderBy('timeAgo', 'desc')
            ->take(2)->get();
        return view('afterLogin.job-preview', compact('preview', 'recent'));
    }
}