<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Repositories\Interfaces\StudentRepoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class student_controller extends Controller
{

    private StudentRepoInterface $userRepoInterface;

    public function __construct(StudentRepoInterface $userRepoInterface) {
        $this->userRepoInterface = $userRepoInterface;
    }

    public function home()
    {
        if (session()->has('student'))
            return view("student.stuHome");
        else
            return view("student.studentSignin");
    }

    public function signup()
    {
        return view("student.studentSignup");
    }

    public function signin()
    {
        if (session()->has('student'))
            return redirect("/stuHome");
        else
            return view("student.studentSignin");
    }

    public function store(Request $request)
    {
        $request->validate([
            'stuname' => 'required',
            'stuemail' => 'required | email',
            'stupass' => 'required',
            'stuconpass' => 'required | same:stupass',
            'stucheck' => 'required'
        ]);
        $student = new Student;
        $student->name = $request['stuname'];
        $student->email = $request['stuemail'];
        $student->password = $request['stupass'];
        $student->address = $request['stuadd'];
        $student->institute = $request['stuinstitute'];
        $student->instituteaddress = $request['stuInsAdd'];
        $student->save();
        return view('student.studentSignin');
    }

    public function check(Request $request)
    {
        $request->validate([
            'stuemail' => 'required | email',
            'stupass' => 'required',
            // 'stucheck' => 'required'
        ]);
        $email = $request['stuemail'];
        $password = $request['stupass'];
        $student = Student::where('email', $email)->get();
        if (sizeof($student) != 0) {
            // return $student;
            // echo $student;
            // die;
            if ($student[0]->password == $password) {
                session()->put("student", $student[0]);
                return redirect("/stuHome");
            } else {
                $message = "Wrong Credentials";
            }
        } else {
            $message = "No User Find";
        }
        return view('student.studentSignin', [
            'message' => $message
        ]);
    }

    public function allstudent()
    {
        if (session()->has('student')) {
            $stu = Student::with(['getStudentAddresses','getStudentpersonaldetails'])->get();

            // dd($stu[0]->getStudentAddresses);

            // dd($stu);

            return view("student.stuAll", [
                'students' => $stu,
            ]);
        } else {
            return view("student.studentSignin");
        }
    }

    public function editView($id)
    {
        if (session()->has('student')) {
            $stu = Student::all();
            return view("student.stuAll", [
                'students' => $stu,
                'id'=>$id,
            ]);
        } else {
            return view("student.studentSignin");
        }
    }

    public function editSave(Request $request, $id)
    {
        $request->validate([
            'stuname' => 'required',
        ]);
        $stu=Student::find($id);
        $stu->name = $request['stuname'];
        $stu->address = $request['stuadd'];
        $stu->institute = $request['stuinstitute'];
        $stu->instituteaddress = $request['stuInsAdd'];
        $stu->save();
        return redirect("/stuAll");
    }

    public function delete($id)
    {
        if (session()->has('student')) {
            $stu = DB::table('student')->where('studentid', $id)->first();
            // echo $stu;
                if($stu){
                    // echo "hello";
                    Student::where('studentid',$id)->firstorfail()->delete();
                }
               return redirect("/stuAll");
        } else {
            return view('student.studentSignin');
        }
    }

    public function personalView($studentid)
    {
        if (session()->has('student')) {
            return view('student.stuSavePersonalDetails',[
                'studentid'=>$studentid,
            ]);
        }
        else{
            return view('student.studentSignin');
        }
    }
    public function personalSave(Request $request)
    {
        if (session()->has('student')) {
            return view('student.stuSavePersonalDetails');
        }
        else{
            return view('student.studentSignin');
        }
    }

    public function logout()
    {
        if (session()->has('student')) {
            session()->forget('student');
        }
        return redirect("/stusignin");
    }

    public function checkRepo()
    {
        dd($this->userRepoInterface->findAllStudent());
    }

}

