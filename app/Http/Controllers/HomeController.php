<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    private $courses,$course, $offerCourses, $enroll, $status;
    public function index()
    {
        return view('website.home.index', [
            'courses' => Course::where('status', 1)->orderBy('id', 'desc')->take(4)->get(['id', 'title', 'image', 'fee']),
            'offerCourses' => Course::where('fee', '<', 1000)->orderBy('id', 'desc')->get(),
            ]);

    }

    public function about()
    {
        return view('website.about.index');
    }

    public function courses()
    {
        return view('website.courses.index', [
            'courses' => Course::where('status', 1)->orderBy('id', 'desc')->get(),
        ]);
    }



    public function detail($id)
    {
        $this->course = Course::find($id);
        if(Session::get('student_id'))
        {
            $this->enroll = Enroll::where('student_id', Session::get('student_id'))->where('course_id', $id)->first();
            if($this->enroll)
            {
                $this->status = true;
            }
            else
            {
                $this->status = false;
            }
        }
        else
        {
            $this->status = false;
        }
        return view('website.courses.detail', [
            'course' => $this->course,
            'status' => $this->status,
        ]);
    }








    public function contact()
    {
        return view('website.contact.index');
    }

    public function auth()
    {
        return view('website.auth.index');
    }








}
