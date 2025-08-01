<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'iPhone 15',
                'description' => 'Dernière génération d\'iPhone avec processeur A16',
                'slug' => 'iphone-15',
                'price' => 999.99,
                'quantity' => 100,
                'sku' => 'IP15001',
                'image' => ['iphone15-1.jpg', 'iphone15-2.jpg'],
                'is_active' => true,
                'category_id' => 1
            ],
            [
                'name' => 'MacBook Pro 14"',
                'description' => 'MacBook Pro avec puce M3',
                'slug' => 'macbook-pro-14',
                'price' => 2499.99,
                'quantity' => 25,
                'sku' => 'MBP14001',
                'image' => ['mbp14-1.jpg', 'mbp14-2.jpg'],
                'is_active' => true,
                'category_id' => 2
            ],
            [
                'name' => 'AirPods Pro',
                'description' => 'Écouteurs sans fil avec réduction de bruit',
                'slug' => 'airpods-pro',
                'price' => 279.99,
                'quantity' => 150,
                'sku' => 'APP001',
                'image' => ['airpods-1.jpg'],
                'is_active' => true,
                'category_id' => 3
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
