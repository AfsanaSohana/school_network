<?php

namespace App\Http\Controllers\Api;

use App\Models\Reading;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    public function index(){
        $data=Reading::get();
        return $this->sendResponse($data,"Reading data");
    }

    public function store(Request $request){
        $data=Reading::create($request->all());
        return $this->sendResponse($data,"Reading created successfully");
    }
    public function show(Reading $reading){
        return $this->sendResponse($reading,"Reading data");
    }

    public function update(Request $request,$id){

        $data=Reading::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Reading updated successfully");
    }

    public function destroy(Reading $reading)
    {
        $reading=$reading->delete();
        return $this->sendResponse($reading,"Reading deleted successfully");
    }
}