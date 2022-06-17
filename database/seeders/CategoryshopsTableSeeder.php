<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoryshopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoryshops')->insert([
            [
            'title' => 'SIAKAD',
            'slug' => 'siakad',
            'description' => 'HTML adalah singkatan dari Hypertext Markup Language',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'SIAKAD basic',
            'slug' => 'siakad-basic-1',
            'description' => 'HTML tingkat dasar',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 1
            ],
            [
            'title' => 'SIAKAD advanced',
            'slug' => 'siakad-advanced-1',
            'description' => 'HTML tingkat dasar',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 1
            ],
            [
            'title' => 'ARSIP DIGITAL',
            'slug' => 'arsip-digital',
            'description' => 'CSS atau Cascading Style Sheets adalah salah satu topik yang harus diketahui dalam pengembangan website.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'SPP',
            'slug' => 'spp',
            'description' => 'JavaScript adalah salah satu bahasa pemrograman yang sering digunakan oleh website programmer atau website developer.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'CMS BLOG',
            'slug' => 'cms-blog',
            'description' => 'Hypertext Preprocessor adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML. PHP banyak dipakai untuk memprogram situs web dinamis. PHP dapat digunakan untuk membangun sebuah CMS.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
        ]);
    }
}
