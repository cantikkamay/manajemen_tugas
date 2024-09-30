<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
       
        Category::create(['name' => 'Pekerjaan']);
        Category::create(['name' => 'Pribadi']);
        Category::create(['name' => 'Kuliah']);
        Category::create(['name' => 'Kesehatan']);
        Category::create(['name' => 'Hobi']);
    }
}
