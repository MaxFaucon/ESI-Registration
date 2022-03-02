<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class CreateAdministrativeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'secretaire',
            'email' => 'secretaire@gmail.com',
            'password' => bcrypt('secretaire')
        ]);

        $role = Role::create(['name' => 'Administrative staff']);
        
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            if(str_starts_with($permission->name, 'administrative')){
                $role->givePermissionTo($permission->id);
            }
        }

        $user->assignRole([$role->id]);
        
    }
}
