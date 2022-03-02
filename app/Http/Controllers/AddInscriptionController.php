<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\File;
use App\Http\Controllers\Auth;

class AddInscriptionController extends Controller
{
    /**
     * Stores a user informations and its files
     */
    public function storeUser(Request $request){
        // Gets user information
        $nom = $request->nom;
        $prenom = $request->prenom;
        $telephone = $request->tel;
        $bloc = $request->bloc;
        $opt = $request->opt;

        // Gets the user id to use it as the student serial number
        $matricule = auth()->user()->id;

        Student::addInfoInscriptionV($matricule, $nom,$prenom,$telephone, $bloc, $opt);


        // Stores all input files
        foreach($request->files as $n => $file){
            File::insertFile($matricule,$file,$request,$n);
        }

        return redirect("/");
    }
}
