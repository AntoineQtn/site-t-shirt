<?php

// database/seeders/CategorySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Smartphones',
                'description' => 'Téléphones intelligents et accessoires',
                'slug' => 'smartphones',
                'is_active' => true
            ],
            [
                'name' => 'Ordinateurs',
                'description' => 'Ordinateurs portables et de bureau',
                'slug' => 'ordinateurs',
                'is_active' => true
            ],
            [
                'name' => 'Accessoires',
                'description' => 'Accessoires électroniques divers',
                'slug' => 'accessoires',
                'is_active' => true
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
