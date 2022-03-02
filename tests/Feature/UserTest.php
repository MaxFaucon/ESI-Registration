<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\UserController;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_user()
    {
        $user = User::factory()->make();
        User::create(['name' => $user->name, 'email' => $user->email, 'password' => $user->password]);
        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
        ]);
    }

    public function test_delete_user()
    {
        $user = User::factory()->make();
        $userDB = User::create(['name' => $user->name, 'email' => $user->email, 'password' => $user->password]);
        $userToDelete = User::find($userDB->id);
        $userToDelete->delete();
        $this->assertDeleted($userToDelete);
    }

    public function test_update_user()
    {
        $user = User::factory()->make();
        $userDB = User::create(['name' => $user->name, 'email' => $user->email, 'password' => $user->password]);
        $userToUpdate = User::find($userDB->id);
        $userToUpdate->update(['name' => 'max']);
        $this->assertDatabaseHas('users', [
            'name' => 'max',
            'email' => $user->email,
            'password' => $user->password,
        ]);
    }

    public function test_register_same_email_error()
    {
        $this->expectException("Illuminate\Database\QueryException");

        $user = User::factory()->make();
        User::create(['name' => $user->name, 'email' => $user->email, 'password' => $user->password]);
        User::create(['name' => $user->name, 'email' => $user->email, 'password' => $user->password]);
    }

    /** If a user is deleted, is it deleted in students */
    public function test_delete_user_in_students()
    {
        $user = User::factory()->make();
        $userDB = User::create(['name' => $user->name, 'email' => $user->email, 'password' => $user->password]);
        $userToDelete = User::find($userDB->id);

        $userToDelete->delete();

        $this->assertDatabaseMissing('students', [
            'id' => $userToDelete->id,
        ]);
    }    
}
