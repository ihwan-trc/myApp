<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserTableSeeder::class,
            CategoryTableSeeder::class,
            TagTableSeeder::class,
            PermissionTableSeeder::class,
<<<<<<< HEAD
            CategoryshopsTableSeeder::class,
=======
            CategoryShopTableSeeder::class
>>>>>>> d355045b5007d837baa09b78c2391e2e3efe2646
        ]);
    }
}
