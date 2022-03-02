<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RoleController;

class RoleTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Create admin role.
     *
     * @return void
     */
    public function test_createAdminRole()
    {
        $role = Role::create(['name' => 'Admin']);

        $this->assertDatabaseHas('roles', [
            'name' => $role->name,
        ]);

    }

    /**
     * Delete admin role.
     * 
     * @return void
     */
    public function test_deleteAdminRole()
    {
        DB::table("roles")->where('name','Admin')->delete();

        $this->assertDatabaseCount("roles",0);
    }

    /**
     * Delete a role.
     * 
     * @return void
     */
    public function test_deleteRole()
    {
        $role = Role::create(['name' => 'bidon']);
        $role = Role::create(['name' => 'poutre']);

        $countExpected = count(DB::table("roles")->get());

        DB::table("roles")->where('name','bidon')->delete();

        $this->assertDatabaseCount("roles",$countExpected - 1);
    }

    /**
     * Delete a inexistant role.
     * 
     * @return void
     */
    public function test_deleteInexistantRole()
    {
        $countExpected = count(DB::table("roles")->get());
        DB::table("roles")->where('name','azerty')->delete();

        $this->assertDatabaseCount("roles",$countExpected);
    }

    /**
     * Create duplicate admin role.
     *
     * @return void
     */
    public function test_createDuplicateAdminRole()
    {
        $this->expectException("Spatie\Permission\Exceptions\RoleAlreadyExists");
        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Admin']);
    }

    /**
     * delete admin role is forbiden.
     *
     * @return void
     */
    public function test_tryToDeleteAdminRole()
    {
        $role = Role::create(['name' => 'Admin']);
        $rolectrl = new RoleController();
        $rolectrl->destroy($role->id);

        $this->assertDatabaseHas('roles', [
            'name' => $role->name,
        ]);
    }
}
