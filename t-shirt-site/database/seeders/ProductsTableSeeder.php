<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 't-shirt 1',
                'description' => 'Description du produit 1',
                'image' => 'image1.jpg',
                'brand' => 'Marque A',
                'available' => true,
                'quantity' => 10,
                'price' => 29.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 't-shirt 2',
                'description' => 'Description du produit 2',
                'image' => 'image2.jpg',
                'brand' => 'Marque B',
                'available' => false,
                'quantity' => 0,
                'price' => 15.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

}

