<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class IdxProgramCategoryDuaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'id' => 'Z2',
            'category_name' => 'Gharimin',
            'deskripsi' => 'Terlilit Hutang',
        ]);

        Category::create([
            'id' => 'Z3',
            'category_name' => 'Muallaf',
            'deskripsi' => 'Muallaf',
        ]);

        Category::create([
            'id' => 'Z4',
            'category_name' => 'Riqob',
            'deskripsi' => 'Budak atau Tawanan',
        ]);

        Category::create([
            'id' => 'Z5',
            'category_name' => 'Ibnu Sabil',
            'deskripsi' => 'Musafir Kehabisan Bekal',
        ]);
    }
}
