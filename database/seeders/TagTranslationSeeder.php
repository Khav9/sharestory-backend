<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TagTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            1 => ['en' => 'Mathematics', 'km' => 'គណិតវិទ្យា'],
            2 => ['en' => 'Physics', 'km' => 'រូបវិទ្យា'],
            3 => ['en' => 'Chemistry', 'km' => 'គីមីវិទ្យា'],
            4 => ['en' => 'Biology', 'km' => 'ជីវវិទ្យា'],
            5 => ['en' => 'Geography', 'km' => 'ភូមិវិទ្យា'],
            6 => ['en' => 'Literature', 'km' => 'អក្សរសាស្រ្ត'],
            7 => ['en' => 'Art', 'km' => 'សិល្បៈ'],
            8 => ['en' => 'Music', 'km' => 'តន្ត្រី'],
            9 => ['en' => 'Physical Education', 'km' => 'កីឡា'],
            10 => ['en' => 'Coding', 'km' => 'កូដ']
        ];

        $timestamp = Carbon::now();
        $translations = [];

        foreach ($tags as $id => $languages) {
            foreach ($languages as $lang => $translated) {
                $translations[] = [
                    'tag_id' => $id,
                    'language' => $lang,
                    'translated' => $translated,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                ];
            }
        }

        DB::table('tag_translations')->upsert($translations, ['tag_id', 'language']); // Prevents duplicate translations
    }
}
