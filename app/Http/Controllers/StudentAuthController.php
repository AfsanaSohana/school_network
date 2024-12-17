<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\Student\RegisterRequest;
use App\Http\Requests\Student\LoginRequest;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function register(){
        return view('student_auth.register');
    }
    public function register_save(RegisterRequest $r){
        $input=$r->all();
        $input['password']=bcrypt($input['password']);
        Student::create($input);
        return redirect('login');
    }

    public function login(){
        return view('student_auth.login');
    }

    public function login_check(LoginRequest $request){
        try{
            $user=Student::where('email',$request->email)->first();
            if($user){
                if(Hash::check($request->password , $user->password)){
                    $this->setSession($user);
                    return redirect()->route('student.dashboard')->with('success','Successfully login');
                }else
                    return redirect('login')->with('error','Your email or password is wrong!');
            }else
                return redirect('login')->with('error','Your email or password is wrong!');
        }catch(Exception $e){
            dd($e);
            return redirect('login')->with('error','Your email or password is wrong!');
         }
    }

    public function setSession($user){
        return request()->session()->put([
                'userRole'=>'student',
                'userId'=>encryptor('encrypt',$user->id),
                'userName'=>encryptor('encrypt',$user->name),
                'userEmail'=>encryptor('encrypt',$user->email)
            ]
        );
    }

    public function logout(){
        request()->session()->flush();
        return redirect('login')->with('danger','Successfully logged out');
    }
    public function _logout(){
        request()->session()->flush();
        return redirect('login')->with('error','You are not active user');
    }

}
