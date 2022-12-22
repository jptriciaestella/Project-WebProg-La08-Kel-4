<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_category')->insert([
            'post_id' => 1,
            'category_id' => 1
        ]);

        DB::table('post_category')->insert([
            'post_id' => 1,
            'category_id' => 3
        ]);

        DB::table('post_category')->insert([
            'post_id' => 2,
            'category_id' => 4
        ]);

        DB::table('post_category')->insert([
            'post_id' => 2,
            'category_id' => 2
        ]);

        DB::table('post_category')->insert([
            'post_id' => 3,
            'category_id' => 3
        ]);

        DB::table('post_category')->insert([
            'post_id' => 4,
            'category_id' => 5
        ]);

        DB::table('post_category')->insert([
            'post_id' => 5,
            'category_id' => 2
        ]);
    }
}
