<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function _register(Request $r): JsonResponse
    {
         $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'contact_no'=>'required',
        'password' => 'required',
        'role' => 'required|in:student,school_admin,super_admin',
    ]);
        if($validate->fails()){
            return $this->sendError($validate->errors(),"Validation Error",203);
        }

        $input= $r->all();
        $input['password']=bcrypt($input['password']);

         $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'role' => $validated['role'],
        'school_id' => $validated['role'] === 'student' ? null : $request->input('school_id'),
        'status' => $validated['role'] === 'student' ? 'pending' : 'approved',
    ]);
        return $this->sendResponse($data,"User register successfully");

    }

    public function _login(Request $r):JsonResponse
    {
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            $user=Auth::user();
            $data['token']=$user->createToken('hosp')->plainTextToken;
            $data['data']=$user;
            return $this->sendResponse($data,"User login successfully");
        }else{
            return $this->sendError(['error'=>'email or password is not correct'],"Unauthorized",400);
        }
    }



}
