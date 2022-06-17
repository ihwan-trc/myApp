<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            [
            'title' => 'WEB APP',
            'slug' => 'web-app',
            'description' => 'web app description',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
            [
            'title' => 'SIAKAD',
            'slug' => 'siakad-1',
            'description' => 'Siakad description',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 1
            ],
            [
            'title' => 'MOBILE APP',
            'slug' => 'mobile-app-1',
            'description' => 'mobile app description',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => 1
            ],
            [
            'title' => 'DEKSTOP APP',
            'slug' => 'dekstop-app',
            'description' => 'dekstop app description',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'parent_id' => null
            ],
        ]);
    }
}
