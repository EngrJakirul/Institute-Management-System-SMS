<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Course extends Model
{
    use HasFactory;
    private static $course, $image,$message,$directory, $imageExtension, $imageName, $imageDirectory, $imageUrl, $fee;

    public static function getImageUrl($request, $directory)
    {
        self::$image                          = $request->file('image');
        self::$imageExtension                 = self::$image->getClientOriginalExtension();
        self::$imageName                      = 'ims_'.time().'.'.self::$imageExtension;
        self::$image->move($directory, self::$imageName);
        return $directory.self::$imageName;
    }

    public static function newCourse($request)
    {
        self::$course                         = new Course();
        self::$course->teacher_id             = Session::get('teacher_id');
        self::$course->title                  = $request->title;
        self::$course->starting_date          = $request->starting_date;
        self::$course->starting_timestamp     = strtotime($request->starting_date);
        self::$course->ending_date            = $request->ending_date;
        self::$course->ending_timestamp       = strtotime($request->ending_date);
        self::$course->fee                    = $request->fee;
        self::$course->course_duration        = $request->course_duration;
        self::$course->short_description      = $request->short_description;
        self::$course->long_description       = $request->long_description;
        self::$course->image                  = self::getImageUrl($request, 'upload/course-images/');
        self::$course->save();
    }

    public static function updateCourseStatus($id)
    {
        self::$course = Course::find($id);
        if(self::$course->status == 0)
        {
            self::$course->status = 1;
            self::$message = 'Course status info published successfully.';
        }
        else
        {
            self::$course->status = 0;
            self::$message = 'Course status info unpublished successfully';
        }
        self::$course->save();
        return self::$message;
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public static function newCourseOffer($request)
    {
        self::$course                         = Course::find($request->course_id);
        self::$course->fee                    = $request->fee;
        self::$course->image                  = self::getImageUrl($request, 'upload/course-offer-images/');
        self::$course->save();
    }

    public static function updateOffer($request)
    {
        self::$course = Course::find($request->course_id);
        if($request->file('image'))
        {
            if(file_exists(self::$course->image))
            {
                unlink(self::$course->image);
            }
            self::$imageUrl = self::getImageUrl($request, 'upload/course-offer-images');
        }
        else
        {
            self::$imageUrl = self::$course->image;
        }
        self::$course->fee                    = $request->fee;
        self::$course->image                  = self::$imageUrl;
        self::$course->save();
    }


    public static function updateCourse($request, $id)
    {
        self::$course = Course::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$course->image))
            {
                unlink(self::$course->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$course->image;
        }
        self::$course->teacher_id             = Session::get('teacher_id');
        self::$course->title                  = $request->title;
        self::$course->starting_date          = $request->starting_date;
        self::$course->starting_timestamp     = strtotime($request->starting_date);
        self::$course->ending_date            = $request->ending_date;
        self::$course->ending_timestamp       = strtotime($request->ending_date);
        self::$course->fee                    = $request->fee;
        self::$course->fee                    = $request->fee;
        self::$course->course_duration        = $request->course_duration;
        self::$course->short_description      = $request->short_description;
        self::$course->long_description       = $request->long_description;
        self::$course->image                  = self::$imageUrl;
        self::$course->save();
    }

    public static function deleteCourse($id)
    {
        self::$course = Course::find($id);
        if(file_exists(self::$course->image))
        {
            unlink(self::$course->image);
        }
        self::$course->delete;
    }
}

