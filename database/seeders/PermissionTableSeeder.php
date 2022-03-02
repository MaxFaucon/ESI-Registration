<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'student',
           'student-viewESIQuery',
           'student-editESIQuery',
           'student-viewPAE',
           'student-editPAE',
           'student-cavpQuery',
           'administrative',
           'cavp',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
