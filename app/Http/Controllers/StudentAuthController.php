<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class StudentAuthController extends Controller
{
    private $student;
    public function logout()
    {
        Session::forget('student_id');
        Session::forget('student_name');

        return redirect('/login-registration');
    }

    public function login(Request $request)
    {
        $this->student = Student::where('email', $request->email)->first();
        if($this->student)
        {
            if(password_verify($request->password, $this->student->password))
            {
                Session::put('student_id', $this->student->id);
                Session::put('student_name', $this->student->name);

                return redirect('/student/dashboard');
            }
            else
            {
                return redirect()->back()->with('message', 'Password is invalid');
            }
        }
        else
        {
            return redirect()->back()->with('message', 'Email address is invalid');
        }

    }
}
