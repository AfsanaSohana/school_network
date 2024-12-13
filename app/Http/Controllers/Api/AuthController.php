<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    /**
     * User Registration
     */
    public function _register(Request $r): JsonResponse
    {
        // Validate request
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'contact_no' => 'required',
            'password' => 'required',
            'role' => 'required|in:student,school_admin,super_admin',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors(), "Validation Error", 422);
        }

        // Create user
        $input = $r->all();
        $input['password'] = bcrypt($input['password']);
        $input['status'] = $input['role'] === 'student' ? 'pending' : 'approved';

        $user = User::create($input);

        // Prepare response data
        $data = [
            'user' => $user,
        ];

        return $this->sendResponse($data, "User registered successfully");
    }

    /**
     * User Login
     */
    public function _login(Request $r): JsonResponse
    {
        // Attempt authentication
        if (Auth::attempt(['email' => $r->email, 'password' => $r->password])) {
            $user = Auth::user();
            
            // Create a personal access token
            $data = [
                'token' => $user->createToken('hosp')->plainTextToken,
                'user' => $user,
            ];

            return $this->sendResponse($data, "User logged in successfully");
        } else {
            return $this->sendError(['error' => 'Email or password is incorrect'], "Unauthorized", 401);
        }
    }
}
