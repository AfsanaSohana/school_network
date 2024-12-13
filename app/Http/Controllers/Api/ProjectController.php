<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class ProjectController extends BaseController
{
    public function index(){
        $data=Project::get();
        return $this->sendResponse($data,"Project data");
    }

    public function store(Request $request){
        $data=Project::create($request->all());
        return $this->sendResponse($data,"Project created successfully");
    }
    public function show(Project $project){
        return $this->sendResponse($project,"Project data");
    }

    public function update(Request $request,$id){

        $data=Project::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Project updated successfully");
    }

    public function destroy(Project $project)
    {
        $project=$project->delete();
        return $this->sendResponse($project,"Project deleted successfully");
    }
}