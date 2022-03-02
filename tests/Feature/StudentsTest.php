<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\AddInscriptionController;

class StudentsTest extends TestCase
{
    use RefreshDatabase;

    /** Basic add student test */
    public function test_register_student()
    {
        // create user
        $user = User::factory()->make();
        User::create(['name' => htmlspecialchars($user->name), 'email' => $user->email, 'password' => $user->password]);
        
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
    }

    /** test student delete with Student::where('id', $id)->delete */
    public function test_delete_student()
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

        Student::where('id', $selectedUser[0]->id)->delete();
        $this->assertDatabaseMissing('students', [
            'id' => $selectedUser[0]->id,
            'nom' => "Aamlaoui",
            'prenom' => "Sofian",
            'num_telephone' =>$num_tel, 
            'bloc' => 2,
            "opt" => 'G',
        ]);
    }

    /** test student update with Student::where('id', $id)->update */
    public function test_update_student()
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

        Student::where('id', $selectedUser[0]->id)->update(['nom' => 'Aamlaoui2', 'prenom' => 'Sofian2', 'num_telephone' => '123456789', 'bloc' => '2', 'opt' => 'G']);
        $this->assertDatabaseHas('students', [
            'id' => $selectedUser[0]->id,
            'nom' => "Aamlaoui2",
            'prenom' => "Sofian2",
            'num_telephone' =>'123456789', 
            'bloc' => 2,
            "opt" => 'G',
        ]);
    }
}
