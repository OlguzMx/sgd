<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Primer user
        DB::table('users')->insert([
            'name' => 'Oliver',
            'email' => 'ojuarez@arsite.com.mx',
            'rol' => 1,
            'password' => Hash::make('..oliver..'),
        ]);

        // Primer user
        DB::table('users')->insert([
            'name' => 'Victor',
            'email' => 'victor@correo.com',
            'rol' => 1,
            'password' => Hash::make('gerardo123'),
        ]);
    }
}
