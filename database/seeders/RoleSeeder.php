<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Roles untuk Administrator
         */
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        /**
         * Roles untuk Dosen / Pejabat
         */
        Role::create([
            'name' => 'dosen',
            'guard_name' => 'web'
        ]);

        /**
         * Roles untuk Tendik
         */
        Role::create([
            'name' => 'tendik',
            'guard_name' => 'web'
        ]);
    }
}
