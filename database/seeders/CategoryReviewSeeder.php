<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_reviews')->insert([
            'name_rv_cat' => 'Place Travel',
        ]);

        DB::table('category_reviews')->insert([
            'name_rv_cat' => 'Food Travel',
        ]);

        DB::table('category_reviews')->insert([
            'name_rv_cat' => 'Travel Experiences',
        ]);
    }
}
