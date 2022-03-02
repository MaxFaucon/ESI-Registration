<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller {
    public function store(Request $request) {
        $file = $request->file('file');
        $file_name = $request->file('file')->getClientOriginalName();
        $matricule = $_POST['matricule'];
        File::insertFile($matricule, $file, $file_name, $request);
    }
}