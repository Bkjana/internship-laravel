<?php
namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Interfaces\StudentRepoInterface;
use Illuminate\Http\Request;
/**
 * implements interface in class then describe all abstract method.
 * In providers folder and create provider class binding interface and reposistory class (StudentRepoServiceProvide.php)
 * Add provider class in config/app.php file
 */

class StudentReposistory implements StudentRepoInterface{

    // Find all student with student address and their personal details
    public function findAllStudent(){
        return Student::with(['getStudentAddresses','getStudentpersonaldetails'])->get();
    }

    // save student details in database
    public function SaveStudentDetails(Request $request){
        $student = new Student;
        $student->name = $request['stuname'];
        $student->email = $request['stuemail'];
        $student->password = $request['stupass'];
        $student->address = $request['stuadd'];
        $student->institute = $request['stuinstitute'];
        $student->instituteaddress = $request['stuInsAdd'];
        $student->save();
    }

    public function findStudent(int $id){
        return Student::where('studentid', $id)->first();
    }

    public function deleteStudent(int $id){
        Student::where('studentid',$id)->firstorfail()->delete();
    }

    public function updateStudent(Request $request,int $id){
        $stu=Student::find($id);
        $stu->name = $request['stuname'];
        $stu->address = $request['stuadd'];
        $stu->institute = $request['stuinstitute'];
        $stu->instituteaddress = $request['stuInsAdd'];
        $stu->save();
    }

    public function findStudentByEmail(string $email){
        return Student::where('email', $email)->get();
    }
}
