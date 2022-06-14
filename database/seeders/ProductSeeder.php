<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Portátil Asus',
                'SKU' => 1001,
                'description' => 'Core¡5 de última generación',
                'price' => 19800000,
                'stock' => 10,
                'status' => 'Disponible',
            ],
            [
                'name' => 'Teclado',
                'SKU' => 1002,
                'description' => 'Teclado gamer',
                'price' => 95000,
                'stock' => 12,
                'status' => 'Disponible',
            ],
            [
                'name' => 'Mouse',
                'SKU' => 1003,
                'description' => 'Mouse Gamer',
                'price' => 67000,
                'stock' => 15,
                'status' => 'Disponible',
            ],
            [
                'name' => 'Escritorio',
                'SKU' => 1004,
                'description' => 'Escritorio interactivo de oficina',
                'price' => 355000,
                'stock' => 5,
                'status' => 'Disponible',    
            ],
            [
                'name' => 'Base refrigerante',
                'SKU' => 1005,
                'description' => 'Base refrigerante 2 ventiladores',
                'price' => 45000,
                'stock' => 20,
                'status' => 'Disponible',   
            ]
        ];

        foreach ($products as $product) {
            DB::table('products')->insert($product);           
        }

    }
}
