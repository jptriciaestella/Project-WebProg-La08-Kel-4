<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Politik',
        ]);
        DB::table('categories')->insert([
            'name' => 'Horor',
        ]);
        DB::table('categories')->insert([
            'name' => 'Pendidikan',
        ]);
        DB::table('categories')->insert([
            'name' => 'Film',
        ]);
        DB::table('categories')->insert([
            'name' => 'Asmara',
        ]);
    }
}
