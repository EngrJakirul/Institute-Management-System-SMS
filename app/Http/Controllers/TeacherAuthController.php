<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Session;

class TeacherAuthController extends Controller
{
    private $teacher;

    public function login()
    {
        return view('teacher.auth.login');
    }

    public function loginCheck(Request $request)
    {
        $this->teacher = Teacher::where('email', $request->email)->first();
        if($this->teacher)
        {
            if(password_verify($request->password, $this->teacher->password))
            {
                Session::put('teacher_id', $this->teacher->id);
                Session::put('teacher_name', $this->teacher->name);

                return redirect('/teacher/dashboard');
            }
            else
            {
                return redirect('/teacher/login')->with('message', 'Password is wrong');
            }

        }
        else
        {
            return redirect('/teacher/login')->with('message', 'Email is wrong');
        }

    }

    public function logout()
    {
        Session::forget('teacher_id');
        Session::forget('teacher-name');

        return redirect('/teacher/login');
    }


}
