<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Tahukah kamu Hitler meninggal di Garut?',
            'content' => 'Hitler katanya masuk Islam dan menikah dengan seorang Muslimah di hadapan seorang kiai di salah satu pesantren di Garut. Kemudian, ia pergi ke Lombok dan bekerja sebagai dokter dengan mengganti namanya menjadi dr. Poch. Uniknya, sampai sekarang, buku Garut Kota Illuminati bagi sebagian masyarakat Garut, ada yang peduli dan tidak. Bahkan, anggapan orang-orang mengenai Hitler mati di Garut menjadi sebuah aib bagi masyarakat Garut.

            Jadi, apa benar Adolf Hitler mati di Garut?',
            'image' => 'images/1.jpg',
            'user_id' => 2,
        ]);

        DB::table('posts')->insert([
            'title' => 'Review film KKN',
            'content' => 'Ada yang udah nonton film KKN? Serem gak? Ratenya berapa nih? Pengen nonton tapi admin gak ada yang temenin...',
            'image' => 'images/2.jpg',
            'user_id' => 3,
        ]);

        DB::table('posts')->insert([
            'title' => 'Asal usul teorima pitagoras',
            'content' => 'Pythagoras adalah seorang matematikawan dan filsuf Yunani kuno yang terkenal karena teoremanya yang menyandang namanya: teorema Pythagoras. Teorema ini menyatakan bahwa dalam segitiga siku-siku, kuadrat panjang sisi miring (sisi yang berhadapan dengan sudut siku-siku) sama dengan jumlah kuadrat panjang kedua sisi lainnya. Hubungan ini dapat ditulis sebagai:

            a^2 + b^2 = c^2

            di mana a dan b adalah panjang kaki-kaki segitiga dan c adalah panjang sisi miring. Teorema ini dapat digunakan untuk mencari panjang hipotenusa suatu segitiga siku-siku jika panjang kedua sisi lainnya diketahui, atau untuk menentukan apakah suatu segitiga dengan panjang sisi tertentu merupakan segitiga siku-siku.

            Pythagoras juga dikenal karena kontribusinya pada geometri dan studi angka, serta untuk mendirikan gerakan filosofis dan religius yang disebut Pythagoreanisme. Dia dianggap sebagai salah satu filsuf dan matematikawan paling berpengaruh dalam sejarah Yunani kuno.',
            'image' => 'images/3.jpg',
            'user_id' => 1,
        ]);

        DB::table('posts')->insert([
            'title' => 'WDYT? Cocok gak ya??',
            'content' => 'Admin gf x gw jadi bf, cocok gak? he he he he',
            'user_id' => 2,
        ]);

        DB::table('posts')->insert([
            'title' => 'Merinding terus.. Ada yang salah kah..',
            'content' => 'Mau cerita, hari ini admin ke kampus trus nungguin kelas, admin kepagian. Karena bosen, admin buka indoforum, dan pengen liat perkembangan asmara di forum ini.. Malah merinding, serem banget.. Padahal post di kategori asmara tapi kok bulu kuduk admin bediri semua...',
            'user_id' => 3,
        ]);
    }
}
