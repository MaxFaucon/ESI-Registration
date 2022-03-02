<?php

namespace App\Http\Controllers;

use App\Models\PaeModel;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:student-editPAE', ['only' => ['ajout']]);
    }
    
    public function ajout(Request $request){
        PaeModel::ajout($request->userId, $request->courses);
        Student::setPae($request->userId,true);
        return redirect()->route('paeSuccess');
    }
}
