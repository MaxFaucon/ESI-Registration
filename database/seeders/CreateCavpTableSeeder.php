<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class CreateCavpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Cavp',
            'email' => 'cavp@gmail.com',
            'password' => bcrypt('cavp')
        ]);

        $role = Role::create(['name' => 'cavp staff']);
        
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            if(str_starts_with($permission->name, 'cavp')){
                $role->givePermissionTo($permission->id);
            }
        }

        $user->assignRole([$role->id]);
        
    }
}
