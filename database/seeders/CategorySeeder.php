<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Personal Health Care',
                'slug' => 'personal-health-care',
                'logo' => 'path/to/logo1.jpg', // Update with actual path if needed
            ],
            [
                'name' => 'Men\'s Health',
                'slug' => 'mens-health',
                'logo' => 'path/to/logo2.jpg', // Update with actual path if needed
            ]
        ]);
    }
}
