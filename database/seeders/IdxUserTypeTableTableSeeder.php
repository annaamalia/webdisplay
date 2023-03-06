<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class IdxUserTypeTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create([
            'id' => '1',
            'type_name' => 'anonim',
        ]);

        UserType::create([
            'id' => '2',
            'type_name' => 'member',
        ]);

        UserType::create([
            'id' => '3',
            'type_name' => 'admin',
        ]);
    }
}
