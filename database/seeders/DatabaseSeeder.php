<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'      => 'Administrador principal',
            'email'     => 'admin@admin.cl',
            'password'     => bcrypt('admin123'),

        ]);

        \App\Models\User::factory(3)->create();

        $this->call(PermissionSeeder::class);
    }
}
