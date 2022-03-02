<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentEditController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:administrative', ['only' => ['index']]);
    }

    public function index($id){
        $student = Student::get($id);
        if (!$student) {
            abort(404);
        }
        return view('StudentEdit', ['student' => $student]);
    }

    public function update(Request $request, $id){
        Student::updateStudent($id, $request->all());
        return redirect('dashboard');
    }                
}
