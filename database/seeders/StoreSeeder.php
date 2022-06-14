<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
            [
                'name' => 'Tecnología y más',
                'geolocalitation' => 'Medellín',
                'openingdate' => '2001-02-12'
            ],
            [
                'name' => 'Print tecnology',
                'geolocalitation' => 'Medellín',
                'openingdate' => '1992-04-10'
            ],
            [
                'name' => 'InnovaTech',
                'geolocalitation' => 'Bogotá',
                'openingdate' => '2002-11-09'
            ],
            [
                'name' => 'PyM Technologies',
                'geolocalitation' => 'Bucaramanga',
                'openingdate' => '1996-10-04'
            ],
            [
                'name' => 'TIC embernal',
                'geolocalitation' => 'Bogotá',
                'openingdate' => '2001-02-12'
            ],
            [
                'name' => 'DiverTecnolgy',
                'geolocalitation' => 'Manizales',
                'openingdate' => '1996-01-12'
            ]
            ];

        foreach ($stores as $store ) {
            DB::table('stores')->insert($store);
        }            
     
    }
}
