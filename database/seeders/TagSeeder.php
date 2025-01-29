<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['tagname' => 'Mathematics'],
            ['tagname' => 'Physics'],
            ['tagname' => 'Chemistry'],
            ['tagname' => 'Biology'],
            ['tagname' => 'Geography'],
            ['tagname' => 'Literature'],
            ['tagname' => 'Art'],
            ['tagname' => 'Music'],
            ['tagname' => 'Physical Education'],
            ['tagname' => 'Coding'],
        ];

        DB::table('tags')->insert($tags);
    }
}
