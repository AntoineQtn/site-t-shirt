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
                'name' => 't-shirt polo',
                'description' => 'Description du produit 1',
                'image' => 'data:image/png;base64, /9j/4AAQSkZJRgABAQEAYABgAAD…vGgNBENSc9bOQARY1Kaqqvn8nfnq/IP6A/wCR0f0/9/8Ay//Z',
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
            [
                'name' => 'T-Shirt Blanc',
                'description' => 'T-shirt oversize blanc coton',
                'image' => 'https://exemple.com/image.jpg',
                'brand' => 'Teddy Club',
                'available' => true,
                'quantity' => 50,
                'price' => 19.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoute ici autant de produits que tu veux :
            [
                'name' => 'T-Shirt Noir',
                'description' => 'T-shirt slim noir',
                'image' => 'https://exemple.com/image-noir.jpg',
                'brand' => 'Marque C',
                'available' => true,
                'quantity' => 25,
                'price' => 24.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
