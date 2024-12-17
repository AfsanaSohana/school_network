<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function super_admin(){
        $user_id=encryptor('decrypt',request()->session()->get('userId'));
        $data=User::find($user_id);
        return view('dashboard.super_admin',compact('data'));
    }
    public function school_admin(){
        $user_id=encryptor('decrypt',request()->session()->get('userId'));
        $data=User::find($user_id);
        return view('dashboard.school_admin',compact('data'));
    }
    
}