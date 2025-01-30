<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Mathematics',
            'Physics',
            'Chemistry',
            'Biology',
            'Geography',
            'Literature',
            'Art',
            'Music',
            'Physical Education',
            'Coding'
        ];

        $timestamp = Carbon::now();

        $data = array_map(fn($tag) => [
            'tagname' => $tag,
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ], $tags);

        DB::table('tags')->upsert($data, ['tagname']); // Prevents duplicates based on 'tagname'
    }
}
