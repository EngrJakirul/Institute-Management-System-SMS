<?php

namespace App\Models;

use Carbon\Exceptions\EndLessPeriodException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    private static $enroll;

    use HasFactory;

    public static function newEnroll($request, $student_id, $course_id)
    {
        self::$enroll                   = new Enroll();
        self::$enroll->student_id       = $student_id;
        self::$enroll->course_id        = $course_id;
        self::$enroll->enroll_date      = date('Y-m-d');
        self::$enroll->enroll_timestamp = strtotime(date('Y-m-d'));
        self::$enroll->payment_type     = $request->payment_type;
        self::$enroll->save();
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public static function updateEnrollStatus($id)
    {
        self::$enroll = Enroll::find($id);
        if(self::$enroll->enroll_status == 'Pending')
        {
            self::$enroll->enroll_status = 'Complete';
            self::$enroll->payment_status = 'Complete';
            self::$enroll->save();
        }
    }
}
