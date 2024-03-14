<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Primer cliente
        DB::table('clientes')->insert([
            'name' => 'Ervey Ramón Abalos',
            'email' => 'eramos@gob.com.mx',
            'puesto' => 'Director de Tecnologías',
            'num_cel' => '9955772288',
            'num_fijo' => '1234',
            'extension' => '242',
            'empresas_id' => 3,
        ]);

        DB::table('clientes')->insert([
            'name' => 'Ing. Ismael Soriano',
            'email' => 'isorian@tech.com.mx',
            'puesto' => 'Director de Tecnologías',
            'num_cel' => '9951155643',
            'num_fijo' => '24124',
            'extension' => '421',
            'empresas_id' => 2,
        ]);

        DB::table('clientes')->insert([
            'name' => 'M.T.I. Juan Carlos Martínez Martínez',
            'email' => 'eramos@gob.com.mx',
            'puesto' => 'Encargado de Computo',
            'num_cel' => '9922005588',
            'num_fijo' => '1214',
            'extension' => '12',
            'empresas_id' => 1,
        ]);
    }
}
