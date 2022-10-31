<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kasir'),
             'remember_token' => Str::random(10),
             'role' => 'kasir',
             'photo' => 'user.png'

        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin'),
             'remember_token' => Str::random(10),
             'role' => 'admin',
             'photo' => 'user.png'
             

        ]);
    }
}
