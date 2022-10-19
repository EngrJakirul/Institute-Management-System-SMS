<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $teachers, $teacher;
    public function index()
    {
        return view('admin.teacher.index');
    }

    public function manage()
    {
        $this->teachers = Teacher::all();
        return view('admin.teacher.manage', ['teachers' => $this->teachers]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email:rfc,dns|unique:teachers,email',
            'password'  => 'required',
            'mobile'    => 'required',
            'address'   => 'required',
            'image'     => 'required|image',
        ], [
//            'name.required' => 'vai name ta den nai kno ...fazlami koren' ,
//            'email.required' => 'vai email ta dete hobe chok e dekhen na ???',
//            'email.email' => 'vai email ta dete hobe chok e dekhen na ???',
//            'image.required' => 'vai photo den',
//            'image.image' => 'onno file dechen kno eta ki fazlamo korer jayga',
//            'address.required' => 'address den apnare koi kojum pore',
        ]);

        Teacher::newTeacher($request);
        return redirect('/teacher/add')->with('message', 'Teacher info created successfully');

    }

    public function edit($id)
    {
        $this->teacher = Teacher::find($id);
        return view('admin.teacher.edit', [ 'teachers' => $this->teacher]);

    }

    public function delete($id)
    {
//        $this->teacher = Teacher::find($id);
        Teacher::deleteTeacher($id);
        return redirect('/teacher/manage')->with('message', 'Teacher deleted successfully');
    }

    public function update(Request $request, $id)
    {
        Teacher::updateTeacher($request, $id);
        return redirect('/teacher/manage')->with('message', 'Teacher info updated successfully');


    }

}
