<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperiencesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('experiences')->insert([
            [
                'title' => 'Software Developer',
                'company' => 'Tech Company A',
                'start_date' => '2022-01-01',
                'end_date' => '2023-01-01',
                'description' => 'Worked on various projects using PHP and Laravel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Frontend Developer',
                'company' => 'Web Agency B',
                'start_date' => '2021-01-01',
                'end_date' => '2022-01-01',
                'description' => 'Focused on building responsive web applications using React.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
