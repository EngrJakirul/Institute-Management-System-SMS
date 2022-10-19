<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    private static $student, $image, $imageName, $directory, $imageUrl;

    public static function newStudent($request)
    {
        self::$student                = new Student();
        self::$student->name          =  $request->name;
        self::$student->email         =  $request->email;
        self::$student->password      =  bcrypt($request->mobile);
        self::$student->mobile        =  $request->mobile;
        self::$student->save();
        return self::$student;

    }

    public static function updateStudent($request, $id)
    {
        self::$student = Student::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$student->image))
            {
                unlink(self::$student->image);
            }
            self::$image = $request->file('image');
            self::$imageName = 'ims_'.time().'.'.self::$image->extension();
            self::$directory = 'upload/student-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl = self::$directory.self::$imageName;
        }
        else
        {
            self::$imageUrl = self::$student->image;
        }
        self::$student->name          =  $request->name;
        self::$student->email         =  $request->email;
        self::$student->mobile        =  $request->mobile;
        self::$student->address       =  $request->address;
        self::$student->image         =  self::$imageUrl;
        self::$student->save();


    }
}
