<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Primer empresa
        DB::table('empresas')->insert([
            'name' => 'Universidad Veracruzana',
            'email' => 'uv@gob.com.mx',
            'direccion' => 'C. Lomas del Estadio S/N Col. Zona Universitaria',
            'ubicacion' => 'Xalapa, Veracruz',
            'codigo_postal' => '12345',
        ]);

        //Segunda empresa
        DB::table('empresas')->insert([
            'name' => 'SOROTECH',
            'email' => 'sorotech@gob.com.mx',
            'direccion' => 'Humboldt, 72370 Heroica Puebla de Zaragoza, Puebla',
            'ubicacion' => 'Puebla, Puebla',
            'codigo_postal' => '72370',
        ]);
        
        //Tercera empresa
        DB::table('empresas')->insert([
            'name' => 'Secretaría de Administración e Innovación Gubernamental',
            'email' => 'saig@gob.com.mx',
            'direccion' => 'Los Rios, 86035',
            'ubicacion' => 'Villahermosa, Tabasco',
            'codigo_postal' => '86035',
        ]);

        // EMPRESA DE EJEMPLO PARA CREAR CLIENTE Y USARLO EN LOS TIPOS DE DOCUMENTOS ENTRADA/SALIDA DE MAT/EQ A BODEGA
        DB::table('empresas')->insert([
            'name' => '-- EJEMPLO --',
            'email' => 'ejemplo@gmail.com	',
            'direccion' => 'ejemplo',
            'ubicacion' => 'Villahermosa, Tabasco',
            'codigo_postal' => '86035',
        ]);
    }
}
