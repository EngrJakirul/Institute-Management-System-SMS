<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Session;

class TeacherEnrollController extends Controller
{
    private $courses, $enrolls, $completePayment, $incompletePayment, $result = [];
    public function manage()
    {
        $this->courses = Course::where('teacher_id', Session::get('teacher_id'))->get();
        $this->completePayment         = 0;
        $this->incompletePayment       = 0;
        foreach ($this->courses as $key => $course)
        {
            $this->enrolls = Enroll::where('course_id', $course->id)->get();
            foreach ($this->enrolls as $enroll) {
                if ($enroll->payment_status == 'Complete') {
                    $this->completePayment = $this->completePayment + 1;
                }
                else if ($enroll->payment_status == 'Pending') {
                    $this->incompletePayment = $this->incompletePayment + 1;
                }
            }
            $this->result[$key]['title']                = $course->title;
            $this->result[$key]['starting_date']        = $course->starting_date;
            $this->result[$key]['total']                = count($this->enrolls);
            $this->result[$key]['complete']             = $this->completePayment;
            $this->result[$key]['incomplete']           = $this->incompletePayment;

        }

        return view('teacher.enroll.manage', ['result' => $this->result]);
    }
}
