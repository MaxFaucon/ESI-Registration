<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

use App\Http\Controllers\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->id;
        $registred;
        $hascavp;
        if(Student::get($user) == null) {
            $registred = false;
        }else {
            $registred = true;
        }
        
        $test = Student::hasCavp($user);
        if(isset($test[0]->cavp)){
            $hascavp = $test[0]->cavp;
        }
        

        $countStudent = Student::countStudent();
        $countStdNotInscrit = Student::countStudentNotInscrit();
        $countStdInscrit = Student::countStudentInscrit();
        $Rmessage = Student::getRefusalMessage($user);

        if(isset($Rmessage[0]->message))
            $refusal = $Rmessage[0]->message;
        else 
            $refusal = null;

        if(isset($hascavp)){
            return view('home', ["registred" => $registred, "hascavp" => $hascavp, "countStudent" => $countStudent[0]->count, 
                                "countStdNotInscrit" => $countStdNotInscrit[0]->count,"countStdInscrit" => $countStdInscrit[0]->count,
                                "refusal" => $refusal] );
        }else{
            return view('home', ["registred" => $registred, "countStudent" => $countStudent[0]->count, 
                                "countStdNotInscrit" => $countStdNotInscrit[0]->count,"countStdInscrit" => $countStdInscrit[0]->count,
                                "refusal" => $refusal] );
        }
    
    }
    public function selectRep()
    {
        $id = auth()->user()->id;
        $rep = Student::selectReponse($id);

        if(isset($rep[0]->reponse)) {
            $repCavp = $rep[0]->reponse;
            return view('ReponseCavp', ["repCavp" => $repCavp]);
        } else {
            return redirect()->back();
        }  
        
    }
}
