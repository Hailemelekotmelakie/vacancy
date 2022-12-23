<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersList;
use session;

class admin extends Controller
{
    public function admin(){
        if (session('adminRole')) {
                return view('admin.admin');
            }
    }
    
    public function adminoLogout(){
        if(session('adminRole')){
           session()->pull('adminRole');
        }
        return redirect('post-job');
    }
    
}