<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;
use function Termwind\ValueObjects\w;

class EnrollController extends Controller
{
    private $course, $student, $enroll;


    public function index($id)
    {
        $this->course = Course::find($id);
        if(Session::get('student_id'))
        {
            $this->student = Student::find(Session::get('student_id'));
        }
        return view('website.enroll.index', [
            'course'    => $this->course,
            'student'   => $this->student,

        ]);
    }

    public function enrollStudent(Request $request, $id)
    {


        if(Session::get('student_id'))
        {
            $this->student = Student::find(Session::get('student_id'));
        }
        else
        {
            $this->validate($request, [
                'name'    => 'required',
                'email'   => 'required|unique:students,email',
                'mobile'  => 'required'
            ]);
            $this->student = Student::newStudent($request);
        }


        Session::put('student_id', $this->student->id);
        Session::put('student_name', $this->student->name);

        $this->enroll = Enroll::where('student_id', Session::get('student_id'))->where('course_id', $id)->first();
        if($this->enroll)
        {
            return redirect('/all-courses')->with('message', 'You are already enrolled this course. Please try another course.');

        }
        else
        {
            Enroll::newEnroll($request, $this->student->id, $id);
        }
        return redirect('/enroll-now/'.$id)->with('message', 'you enroll submission save successfully. Please wait. we will contact with you soon');

    }
}
