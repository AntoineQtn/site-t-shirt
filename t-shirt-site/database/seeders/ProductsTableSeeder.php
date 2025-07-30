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
        'description' => 'nike nice',
        'image' => 'image1.jpg',
        'marque' => 'Nike',
        'disponibilite' => true,
        'quantite' => 10,
        'price' => 29.99,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 't-shirt 2',
        'description' => 'nike cool',
        'image' => 'image2.jpg',
        'marque' => 'Nike',
        'disponibilite' => false,
        'quantite' => 800,
        'price' => 15.50,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 't-shirt 3',
        'description' => 'Reebook winter',
        'image' => 'image2.jpg',
        'marque' => 'Reebook',
        'disponibilite' => false,
        'quantite' => 500,
        'price' => 18.50,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 't-shirt 4',
        'description' => 'adidas new',
        'image' => 'image2.jpg',
        'marque' => 'Adidas',
        'disponibilite' => false,
        'quantite' => 39,
        'price' => 25.53,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 't-shirt 2',
        'description' => 'sen flow est un nouveau marque mais robuste',
        'image' => 'image2.jpg',
        'marque' => 'Sen flow',
        'disponibilite' => false,
        'quantite' => 27,
        'price' => 36.99,
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

    }
}
