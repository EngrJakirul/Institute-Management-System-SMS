<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Termwind\ValueObjects\setElement;

class Teacher extends Model
{
    use HasFactory;
    private static $teacher, $image, $imageExtension, $imageName, $imageDirectory, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = 'ims_'.time().'.'.self::$imageExtension;
        self::$imageDirectory = 'upload/teacher-images/';
        self::$image->move(self::$imageDirectory, self::$imageName);
        return self::$imageDirectory.self::$imageName;
    }

    public static function newTeacher($request)
    {
        self::$teacher              = new Teacher();
        self::$teacher->name        = $request->name;
        self::$teacher->email       = $request->email;
        self::$teacher->password    = bcrypt($request->password);
        self::$teacher->mobile      = $request->mobile;
        self::$teacher->address     = $request->address;
        self::$teacher->image       = self::getImageUrl($request);
        self::$teacher->save();

    }

    public static function updateTeacher($request, $id)
    {
        self:: $teacher = Teacher::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$teacher->image))
            {
                unlink(self::$teacher->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$teacher->image;
        }

        self::$teacher->name   = $request->name;
        self::$teacher->email  = $request->email;
        if(isset($request->password))
        {
            self::$teacher->password = bcrypt($request->password);
        }
        self::$teacher->mobile   = $request->mobile;
        self::$teacher->address  = $request->address;
        self::$teacher->image    = self::$imageUrl;
        self::$teacher->save();
    }

    public static function deleteTeacher($id)
    {
        self::$teacher = Teacher::find($id);
        if(file_exists(self::$teacher->image))
        {
            unlink(self::$teacher->image);
        }
        self::$teacher->delete();
    }




}
