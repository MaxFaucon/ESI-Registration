<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class InscriptionController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->id;

        if (Student::get($user) !== null)
        {
            return back();
        } else {
            return view('inscriptionVisiteur');            
        }
    }
}
