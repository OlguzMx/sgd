<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposDocumentos = [
            [
                'name' => 'Remisión',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Cotización',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Orden de Compra',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Garantía y/o cambio de equipo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Entrada de Mat/Eq a bodega',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Salida de Mat/Eq a bodega',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('tipo_documento')->insert($tiposDocumentos);
    }
}
