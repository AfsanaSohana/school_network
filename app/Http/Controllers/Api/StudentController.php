<?php
namespace App\Http\Controllers\Api;

    use App\Models\Student;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Api\BaseController;
    class StudentController extends BaseController
    {
        public function index(){
            $data=Student::get();
            return $this->sendResponse($data,"Student data");
        }
    
        public function store(Request $request){
            $data=Student::create($request->all());
            return $this->sendResponse($data,"Student created successfully");
        }
        public function show(Student $student){
            return $this->sendResponse($student,"Student data");
        }
    
        public function update(Request $request,$id){
    
            $data=Student::where('id',$id)->update($request->all());
            return $this->sendResponse($id,"Student updated successfully");
        }
    
        public function destroy(Student $student)
        {
            $student=$student->delete();
            return $this->sendResponse($student,"Student deleted successfully");
        }
    }