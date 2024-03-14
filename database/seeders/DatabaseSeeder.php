<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
    }
}
