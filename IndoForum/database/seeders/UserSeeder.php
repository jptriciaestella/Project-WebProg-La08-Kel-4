<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Tricia',
            'email' => 'tricia.estella@gmail.com',
            'password' => bcrypt('asd123')
        ]);

        DB::table('users')->insert([
            'username' => 'Budi',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('budi123')
        ]);

        DB::table('users')->insert([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
    }
}
