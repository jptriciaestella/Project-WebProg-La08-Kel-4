<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'post_id' => 1,
            'user_id' => 1,
            'comment' => 'Sebagai orang Garut, saya menyatakan nggak lah, yakali. Mana ada Hitler main ke Garut. Jajan kagak, bikin aib iya.'
        ]);

        DB::table('comments')->insert([
            'post_id' => 1,
            'user_id' => 3,
            'comment' => 'Hoax, hapus ya?'
        ]);

        DB::table('comments')->insert([
            'post_id' => 2,
            'user_id' => 2,
            'comment' => 'GWS min semoga dapet pacar'
        ]);

        DB::table('comments')->insert([
            'post_id' => 2,
            'user_id' => 1,
            'comment' => 'Budi gak nyambung. B aja, gak serem menurut saya'
        ]);

        DB::table('comments')->insert([
            'post_id' => 3,
            'user_id' => 2,
            'comment' => 'Hoam...'
        ]);

        DB::table('comments')->insert([
            'post_id' => 4,
            'user_id' => 3,
            'comment' => 'SAYA LAKIK'
        ]);

        DB::table('comments')->insert([
            'post_id' => 4,
            'user_id' => 1,
            'comment' => 'HAHAHAHAHAHAHAHA'
        ]);

        DB::table('comments')->insert([
            'post_id' => 5,
            'user_id' => 2,
            'comment' => 'Waduch'
        ]);

        DB::table('comments')->insert([
            'post_id' => 5,
            'user_id' => 3,
            'comment' => 'Aduh'
        ]);

        DB::table('comments')->insert([
            'post_id' => 5,
            'user_id' => 1,
            'comment' => 'GWS semuanya :)'
        ]);
    }
}
