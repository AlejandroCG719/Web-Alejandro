<?php

use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Alejandro',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        $role = \App\Role::create(['name' => 'Admin']);
        $permissions = \App\Permission::pluck('id','id')->all();
        $role->permisions()->sync($permissions);

        /*$role->syncPermissions($permissions);*/
        $user->role()->associate($role);

        $user->save();
    }
}
