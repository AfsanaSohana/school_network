<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Project;
use App\Models\Reading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function dashboard(){
        $data=Student::get();
        return view('student.dashboard',compact('data'));
    }
    public function information(){
        $student_id=encryptor('decrypt',request()->session()->get('userId'));
        
        $student=Student::find($student_id);
        $project=Project::where('student_id',$student_id)->get();
        $reading=Reading::where('student_id',$student_id)->get();
        
        return view('student.information',compact('student','project','reading'));
    }

    public function store(Request $request){
        $data=Student::create($request->all());
        return $this->sendResponse($data,"Student created successfully");
        $data=Project::create($request->all());
        return $this->sendResponse($data,"Project created successfully");
        $data=Reading::create($request->all());
        return $this->sendResponse($data,"Reading created successfully");
    }
    
    public function destroy(Student $student)
    {
        $student=$student->delete();
        return $this->sendResponse($student,"Student deleted successfully");
     
    }
}