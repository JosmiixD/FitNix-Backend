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
            'image'  => ''
        ]);
        Category::create([
            'name'  => 'Vegetariano',
            'image' => 'Sencilla',
        ]);
        Category::create([
            'name'  => 'Pasta',
            'image' => 'Sencilla',
        ]);
        Category::create([
            'name'  => 'Alto en proteina',
            'image' => 'Sencilla',
        ]);
        Category::create([
            'name'  => 'Sushi',
            'image' => 'Sencilla',
            ]);
        Category::create([
            'name'  => 'Bebidas',
            'image' => 'Sencilla',
        ]);
        Category::create([
            'name'  => 'Snacks',
            'image' => 'Sencilla',
        ]);
        Category::create([
            'name'  => 'Comida rapida',
            'image' => 'Sencilla',
        ]);
    }
        
}
