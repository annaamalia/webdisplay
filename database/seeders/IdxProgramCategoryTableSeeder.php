<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class IdxProgramCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'id' => 'A0',
            'category_name' => 'Pembangunan',
        ]);

        Category::create([
            'id' => 'A1',
            'category_name' => 'Gerakan',
        ]);

        Category::create([
            'id' => 'A2',
            'category_name' => 'Pemberdayaan',
        ]);

        Category::create([
            'id' => 'Z0',
            'category_name' => 'Fakir Miskin',
        ]);

        Category::create([
            'id' => 'Z1',
            'category_name' => 'Fisabilillah',
            'deskripsi' => 'Pejuang di Jalan Allah',
        ]);
    }
}
