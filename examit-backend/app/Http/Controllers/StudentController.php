<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::orderBy('id', 'ASC')->get();
        return response()->json([
            'student' => $student,
            'status' => 'OK',
        ]);

    }

    public function save(Request $request)
    {
        $student = new Student;

        $student->code = $request->code;
        $student->fullname = $request->fullname;
        $student->room = $request->room;

        $student->save();

        return response()->json([
            'student_data' => $student,
            'message' => 'Data Insert Successfully',
        ]);
    }

    public function update(Request $request)
    {

        $student = Student::find($request->id);

        $student->code = $request->code;
        $student->fullname = $request->fullname;
        $student->room = $request->room;

        $student->save();

        return response()->json([
            'student_data' => $student,
            'message' => 'Data Update Successfully',
        ]);

    }

    public function delete($id)
    {
        $delete = Student::find($id)->delete();

        return response()->json([
            'message' => 'Data Delete Successfully',
        ]);
    }
}
