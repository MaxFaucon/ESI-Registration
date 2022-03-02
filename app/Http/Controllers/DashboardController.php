<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\File;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:administrative|cavp', ['only' => ['index']]);
        $this->middleware('permission:administrative', ['only' => ['accept','delet','refuse','edit','inseration']]);
        $this->middleware('permission:cavp|student', ['only' => ['viewcavp','demand','envoyer']]);
    }

    public function index(){
        $all = Student::getAll();
        return view('dashboard', ['students' => $all]);
    }

    public function accept($id){
        $user = User::find($id);
        $user->assignRole('Student');

        Student::updateInscription($id);
        return redirect('/dashboard');
    }

    public function delet($id){
        Student::deleteRegistration($id);
        return redirect('/dashboard');
    }

    public function refuse(Request $request) {
        $id = $request->id;
        $message = $request->message;
        \DB::insert("insert into message_refusal values(?, ?)", [$id, $message]);
        \DB::update("update students set inscrit= ? where id = ?;", [-1, $id]);
        return redirect('/dashboard');
    }

    public function param($id) {
        $student = Student::get($id);
        $courses = Course::getMyCours($id);
        if (!$student) {
            abort(404);
        }
        $studentFolder = File::getFolderLinkByMatricule($id);
        return view('studentView', ['student' => $student, 'studentFolder' => $studentFolder, 'courses' => $courses]);
    }

    public function demand($id){
        $student = Student::get($id);
        if (!$student) {
            abort(404);
        }
        return view('CavpView', ['student' => $student]);
    }

    public function envoyer(Request $request, $id){
        $data = $request->input();
        $student = Student::updateCavp($id);
        Student::updateCavp2($data['demande'], $id);
        return redirect('/');
    }

    public function viewcavp($id){
        $send = Student::getcavp($id);
        return view('DemandeView',['demande' => $send]);
    }

    public function retourcavp(Request $request, $id){
        $data = $request->input();
        Student::updateReponse($data['reponse'],$id);
        
        return redirect('/');
    }    
}
