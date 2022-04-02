<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

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
            'name' => 'Pro',
        ]);

        Category::create([
            'name' => 'Advance',
        ]);

        Category::create([
            'name' => 'Lifestyle',
        ]);

        Category::create([
            'name' => 'Desktop',
        ]);
    }
}
