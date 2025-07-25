<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 't-shirt 1',
                'description' => 'Description du produit 1',
                'image' => 'image1.jpg',
                'marque' => 'Marque A',
                'disponibilite' => true,
                'quantite' => 10,
                'price' => 29.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 't-shirt 2',
                'description' => 'Description du produit 2',
                'image' => 'image2.jpg',
                'marque' => 'Marque B',
                'disponibilite' => false,
                'quantite' => 0,
                'price' => 15.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
