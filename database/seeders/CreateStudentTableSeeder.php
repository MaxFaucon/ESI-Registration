<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Student;

class CreateStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Student']);
        
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            if(str_starts_with($permission->name, 'student')){
                $role->givePermissionTo($permission->id);
            }
        }
    }
}
