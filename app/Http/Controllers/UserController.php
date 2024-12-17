<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=User::latest()->get();
        return view('user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $input['password']=bcrypt($input['password']);
        $input['role']='school_admin';
        
        if(User::create($input))
            return redirect()->route('users.index');
        else
            return redirect()->back()->withInput()->with('error', 'Failed to create user');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $user=User::find(encryptor('decrypt',$id));
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $input=$request->all();
        unset($input['password']);

        if($request->password)
            $input['password']=bcrypt($request->password);

        if($user->update($input))
            return redirect()->route('users.index');
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
