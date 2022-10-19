<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    private $courses, $course, $message, $offerCourses,$recentCourse, $fee;

    public function manageCourse()
    {
        $this->courses = Course::orderBy('id', 'desc')->take(8)->get();
        return view('admin.course.manage', ['courses' => $this->courses]);
//        return $this->courses;

    }

    public function CourseDetail($id)
    {
        $this->course = Course::find($id);
        return view('admin.course.detail', ['course' => $this->course]);
    }

    public function updateStatus($id)
    {
        $this->message = Course::updateCourseStatus($id);
        return redirect('/admin/manage-course')->with('message', $this->message);
    }

    public function manageOffer()
    {
        $this->courses = Course::where('status', 1)->orderBy('id', 'desc')->get();
        $this->offerCourses = Course::where('status', 1)->where('fee', '>', 0)->orderBy('id', 'desc')->get();
        return view('admin.course.manage-course-offer', [
            'courses'         => $this->courses,
            'offer_courses'   => $this->offerCourses,
        ]);
    }

    public function editOffer($id)
    {
        $this->courses = Course::where('status', 1)->orderBy('id', 'desc')->get();
        $this->course = Course::find($id);
        return view('admin.course.edit-offer', [
            'courses'         => $this->courses,
            'single_course'   => $this->course,

        ]);
    }

    public function createOffer(Request $request)
    {
//        return $request->all();
        Course::newCourseOffer($request);
        return redirect('admin/manage-course-offer')->with('message', 'New course offer created successfully');
    }

    public function updateOffer(Request $request)
    {
        Course::updateOffer($request);
        return redirect('admin/manage-course-offer')->with('message', 'Course offer updated successfully');
    }
}
