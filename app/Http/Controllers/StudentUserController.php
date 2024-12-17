<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Student::latest()->get();
        return view('studentuser.index',compact('data'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function approve($id)
    {
       $sutdent=Student::find(encryptor('decrypt',$id));
        if($sutdent->update(['status'=>1]))
            return redirect()->route('student_user.index');
        else
            return redirect()->back()->withInput()->with('error', 'Failed to create job level');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
