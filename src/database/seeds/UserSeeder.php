<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the User table seeders
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'madmouse',
            'email' => 'madmouse2540@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'sail',
            'email' => 'test1@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'muramoto',
            'email' => 'test2@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'plasmouse2540@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
