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
        $this->call(AdminSeeder::class);
        // \App\Models\Post::factory(17)->create();
        $this->call(PostSeeder::class);
        $this->call(MailsettingSeeder::class);
        $this->call(TagSeeder::class);
    }
}
