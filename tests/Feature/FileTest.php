<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\File;
use App\Models\User;
use App\Models\Student;
use App\Http\Controllers\FileController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_file()
    {       
        File::ajout("Test du path", 58974, 1);

        $this->assertDatabaseHas('files', [
            'path' => "Test du path",
            'matricule' => 58974,
            'id' => 1,
        ]);
    }

    public function test_drop_file()
    {       
        File::drop(58974);

        $this->assertDeleted("files", [
            'matricule' => 58974,
        ]);
    }

    /** test create file with matricule 2, then update the file using File::where('matricule', $matricule) */
    public function test_update_file()
    {
        // create user
        $user = User::factory()->make();
        User::create(['name' => $user->name, 'email' => $user->email, 'password' => $user->password]);
        
        // gets the user id
        $selectedUser = \DB::select("select * from users where name = '".$user->name."';");

        $num_tel = random_int(10000, 99999);

        Student::addInfoInscriptionV($selectedUser[0]->id, "Aamlaoui","Sofian",$num_tel, 2, "G");
        $this->assertDatabaseHas('students', [
            'id' => $selectedUser[0]->id,
            'nom' => "Aamlaoui",
            'prenom' => "Sofian",
            'num_telephone' =>$num_tel, 
            'bloc' => 2,
            "opt" => 'G',
        ]);

        //create file File::create
        $file = File::create([
            'path' => "Bonswaar",
            'matricule' => $selectedUser[0]->id,
            'id' => 1,
        ]);

        $file = File::where('matricule', $selectedUser[0]->id)->first();
        $file->path = "Test du path";
        $file->save();

        $this->assertDatabaseHas('files', [
            'path' => "Test du path",
            'matricule' => $selectedUser[0]->id,
            'id' => 1,
        ]);
    }

    /** test create file with matricule 2, then delete the file using File::where('matricule', $matricule) */
    public function test_delete_file()
    {
        // create user
        $user = User::factory()->make();
        User::create(['name' => htmlspecialchars($user->name), 'email' => $user->email, 'password' => $user->password]);
        
        // gets the user id
        $selectedUser = \DB::select("select * from users where name = '".htmlspecialchars($user->name)."';");

        $num_tel = random_int(10000, 99999);

        Student::addInfoInscriptionV($selectedUser[0]->id, "Aamlaoui","Sofian",$num_tel, 2, "G");
        $this->assertDatabaseHas('students', [
            'id' => $selectedUser[0]->id,
            'nom' => "Aamlaoui",
            'prenom' => "Sofian",
            'num_telephone' =>$num_tel, 
            'bloc' => 2,
            "opt" => 'G',
        ]);

        //create file File::create
        $file = File::create([
            'path' => "Bonswaar",
            'matricule' => $selectedUser[0]->id,
            'id' => 1,
        ]);

        $file = File::where('matricule', $selectedUser[0]->id)->first();
        $file->delete();

        $this->assertDeleted("files", [
            'matricule' => $selectedUser[0]->id,
        ]);
    }
}
