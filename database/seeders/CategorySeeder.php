<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'   => 'Popular',
            'image'  => 'storage/categories/star.png'
        ]);
        Category::create([
            'name'  => 'Bajo en calorias',
            'image' => 'storage/categories/low-carb.jpg',
        ]);
        Category::create([
            'name'  => 'Vegetariano',
            'image' => 'storage/categories/vegan.png',
        ]);
        Category::create([
            'name'  => 'Almuerzos',
            'image' => 'storage/categories/lunch.jpg',
        ]);
        Category::create([
            'name'  => 'Alto en proteina',
            'image' => 'storage/categories/high-protein.png',
        ]);
        Category::create([
            'name'  => 'Sushi',
            'image' => 'storage/categories/sushi.jpg',
            ]);
        Category::create([
            'name'  => 'Bebidas',
            'image' => 'storage/categories/drink.jpg',
        ]);
        Category::create([
            'name'  => 'Snacks',
            'image' => 'storage/categories/snacks.jpg',
        ]);
        Category::create([
            'name'  => 'Comida rapida',
            'image' => 'storage/categories/fast.jpg',
        ]);
    }
        
}
