<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:student-viewPAE', ['only' => ['index', 'MesCours']]);
    }

    public function index()
    {
        $user = Auth::user();
        if (Student::hasPae($user->id)[0]->pae === true) {
            return redirect('/monpae');
        } else {
            $quadri = 0;
            $bloc = 1;
    
            $ectsValid = Course::countECTSValide($user->id);
            $ects = $ectsValid[0]->ects;
            if($ects === null || $ects < 30){
                $quadri = 2;
            }
            if($ects >= 30 && $ects < 45){
                $quadri = 3;
                $bloc = 2;
            }
            if($ects>= 45 && $ects <= 60){
                $quadri = 4;
                $bloc = 3;
            }
            if($ects>60 && $ects < 90){
                $quadri = 5;
                $bloc = 3;
            }
            if($ects>90){
                $quadri = 6;
                $bloc = 3;
            }
    
            Student::setBloc($user->id, $bloc);
            $courses = Course::getCours($user->id, $quadri);
            $student = Student::get($user->id);

            return view('pae', ["courses" => $courses, "student" => $student]);
        }
    }

    public function MesCours()
    {
        $user = Auth::user();
        $courses = Course::getMyCours($user->id);
        return view("paeSuccess", ["courses" => $courses]);
    }
}
