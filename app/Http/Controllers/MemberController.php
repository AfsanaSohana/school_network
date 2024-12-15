<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $data=Member::get();
        return $this->sendResponse($data,"Member data");
    }

    public function store(Request $request){
        $data=Member::create($request->all());
        return $this->sendResponse($data,"Member created successfully");
    }
    public function show(Member $member){
        return $this->sendResponse($member,"Member data");
    }

    public function update(Request $request,$id){

        $data=Member::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Member updated successfully");
    }

    public function destroy(Member $member)
    {
        $member=$member->delete();
        return $this->sendResponse($member,"Member deleted successfully");
    }
}
