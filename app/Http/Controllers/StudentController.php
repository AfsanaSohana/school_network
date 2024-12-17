<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Project;
use App\Models\Reading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function dashboard(){
        $data=Student::get();
        return view('student.dashboard',compact('data'));
    }
    public function information(){
        $student_id=encryptor('decrypt',request()->session()->get('userId'));
        
        $student=Student::find($student_id);
        $members=Student::where('status',1)->get();
        $projects=Project::where('student_id',$student_id)->get();
        $readings=Reading::where('student_id',$student_id)->get();
        
        return view('student.information',compact('student','projects','readings','members'));
    }

    public function store(Request $request,$id){
        $input=$request->all();
        unset($input['_token'],$input['password']);
        if($request->password){
            $input['password']=bcrypt($request->password);
        }

        $data=Student::where('id',$id)->update($input);
        return redirect()->route('student.information')->with('success','Successfully updated');
    }

    public function project_store(Request $request){

        $input=$request->all();

        $files=[];
          if($request->hasFile('files')){
             foreach($request->file('files') as $f){
                 $documentname=time().rand(1111,9999).".".$f->extension();
                 $documentPath=public_path().'/uploads/project';
                 if($f->move($documentPath,$documentname)){
                     array_push($files,$documentname);
                 }
             }
         }
 
         $input['files']=implode(',',$files);
         $input['Member_id']=implode(',',$request->member);
         $input['student_id']=encryptor('decrypt',request()->session()->get('userId'));


        $data=Project::create($input);
        return redirect()->route('student.information')->with('success','Project created successfully');
    }
    public function reading_store(Request $request){

        $input=$request->all();
        $input['student_id']=encryptor('decrypt',request()->session()->get('userId'));

        $data=Reading::create($input);
        return redirect()->route('student.information')->with('success','Reading created successfully');
    }
    
    public function destroy(Student $student)
    {
        $student=$student->delete();
        return $this->sendResponse($student,"Student deleted successfully");
     
    }
}