<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Cardio',
            'Strength Training',
            'Yoga',
            'Pilates',
            'CrossFit',
            'HIIT',
            'Dance',
            'Martial Arts',
            'Cycling',
            'Swimming',
            'Running',
            'Walking',
            'Functional Training',
            'Flexibility',
            'Balance Training',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
