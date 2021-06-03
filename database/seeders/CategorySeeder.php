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
            'image'  => '/categories/star.png'
        ]);
        Category::create([
            'name'  => 'Vegetariano',
            'image' => '/categories/vegan.png',
        ]);
        Category::create([
            'name'  => 'Pasta',
            'image' => '/categories/pasta.png',
        ]);
        Category::create([
            'name'  => 'Alto en proteina',
            'image' => '/categories/protein.png',
        ]);
        Category::create([
            'name'  => 'Sushi',
            'image' => '/categories/sushi.png',
            ]);
        Category::create([
            'name'  => 'Bebidas',
            'image' => '/categories/drink.png',
        ]);
        Category::create([
            'name'  => 'Snacks',
            'image' => '/categories/snacks.png',
        ]);
        Category::create([
            'name'  => 'Comida rapida',
            'image' => '/categories/fast.png',
        ]);
    }
        
}
