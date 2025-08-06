<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoProducto;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposProductos = [
            [
                'nombre' => 'Helados',
                'descripcion' => 'Deliciosos helados cremosos con una gran variedad de sabores tradicionales y gourmet. Perfectos para refrescarte en cualquier momento del día.',
                'imagen' => null, // Puedes agregar una imagen después
            ],
            [
                'nombre' => 'Paletas',
                'descripcion' => 'Paletas artesanales elaboradas con frutas naturales y ingredientes frescos. Opciones con agua, leche y cobertura de chocolate.',
                'imagen' => null,
            ],
            [
                'nombre' => 'Malteadas',
                'descripcion' => 'Cremosas malteadas preparadas con helado premium y leche fresca. Disponibles en múltiples sabores con toppings especiales.',
                'imagen' => null,
            ],
            [
                'nombre' => 'Nieves',
                'descripcion' => 'Refrescantes nieves de agua preparadas con frutas naturales. Ideales para los días más calurosos del año.',
                'imagen' => null,
            ],
            [
                'nombre' => 'Sundaes',
                'descripcion' => 'Exquisitos sundaes con combinaciones únicas de helado, salsas, frutas y toppings crujientes para una experiencia inolvidable.',
                'imagen' => null,
            ],
        ];

        foreach ($tiposProductos as $tipo) {
            TipoProducto::create($tipo);
        }
    }
}