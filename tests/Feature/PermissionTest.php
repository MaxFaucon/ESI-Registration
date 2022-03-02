<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create student permission.
     *
     * @return void
     */
    public function test_createStudentPermission()
    {
        $permission = 'student';
        Permission::create(['name' => $permission]);

        $this->assertDatabaseHas('permissions', [
            'name' => $permission,
        ]);

    }

    /**
     * Delete student permission.
     * 
     * @return void
     */
    public function test_deleteStudentPermission()
    {
        DB::table("permissions")->where('name','student')->delete();

        $this->assertDatabaseCount("permissions",0);
    }

    /**
     * Delete a permission.
     * 
     * @return void
     */
    public function test_deletePermission()
    {
        $permissions = ['bidon', 'poutre'];
        Permission::create(['name' => $permissions[0]]);
        Permission::create(['name' => $permissions[1]]);

        $countExpected = count(DB::table("permissions")->get());

        DB::table("permissions")->where('name',$permissions[0])->delete();

        $this->assertDatabaseCount("permissions",$countExpected - 1);
    }

    /**
     * Delete a inesistant premission.
     * 
     * @return void
     */
    public function test_deleteInexistantRole()
    {
        $countExpected = count(DB::table("permissions")->get());
        DB::table("permissions")->where('name','azerty')->delete();

        $this->assertDatabaseCount("roles",$countExpected);
    }

    /**
     * Create duplicate permission.
     *
     * @return void
     */
    public function test_createDuplicatePermission()
    {
        $this->expectException("Spatie\Permission\Exceptions\PermissionAlreadyExists");
        $permission = 'student';
        Permission::create(['name' => $permission]);
        Permission::create(['name' => $permission]);
    }

}
