<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Data User untuk administrator
         */
        $admin = User::create([
            'name' => 'Administrator Website',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin12345')
        ]);
        $admin->assignRole('admin');


        /**
         * Data User untuk dosen atau pejabat
         */
        $dosen = User::create([
            'name' => 'Nama Dosen',
            'email' => 'dosen@dosen.com',
            'password' => Hash::make('dosen12345')
        ]);
        $dosen->assignRole('dosen');

        /**
         * Data User untuk tenaga pendidik
         */
        $tendik = User::create([
            'name' => 'Nama tendik',
            'email' => 'tendik@tendik.com',
            'password' => Hash::make('tendik12345')
        ]);
        $tendik->assignRole('tendik');
    }
}
