<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Permission list
        Permission::create(['name' => 'config.index']);
        Permission::create(['name' => 'config.edit']);
        Permission::create(['name' => 'config.show']);
        Permission::create(['name' => 'config.create']);
        Permission::create(['name' => 'config.destroy']);

        //Admin=High, mid and low level access to the information
        $admin = Role::create(['name' => 'admin']);
        $mid = Role::create(['name' => 'mid']);
        $low = Role::create(['name' => 'low']);

        $admin->givePermissionTo([
            'config.index',
            'config.edit',
            'config.show',
            'config.create',
            'config.destroy'
        ]);
        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());
       
        //Guest
        $guest = Role::create(['name' => 'guest']);

        $guest->givePermissionTo([
            'config.index',
            'config.show'
        ]);

        //User Admin
        $user = User::find(1); //Admin
        $user->assignRole('admin');
    
    }
}
