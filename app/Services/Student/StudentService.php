<?php

namespace App\Services\Student;

use App\Models\Level;
use App\Models\LevelTask;
use App\Models\Student;
use App\Models\StudentTask;
use Illuminate\Support\Facades\DB;

class StudentService
{
    public function getData($request)
    {

        $query = Student::query();

        $students = $query->paginate(10);

        return $students;
    }

    public function createData($request)
    {

        $student = new Student();
        $student->name = $request->name;
        $student->class = $request->class;
        $request->email ? $student->email = $request->email : null;
        $student->save();

        return $student;
    }

    public function updateData($id, $request)
    {

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->class = $request->class;
        $request->email ? $student->email = $request->email : null;
        $student->save();


        return  $student;
    }

    public function deleteData($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return $student;
    }
}
