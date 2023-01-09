<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Category::create(['name' => 'comic']);
        Category::create(['name' => 'novel']);
        Category::create(['name' => 'fantasy']);
        Category::create(['name' => 'fiction']);
        Category::create(['name' => 'mystery']);
        Category::create(['name' => 'horror']);
        Category::create(['name' => 'romance']);
    }
}
