<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert([
            [
                'title' => 'Project One',
                'description' => 'This is a description for Project One.',
                'date' => '2024-01-01',
                'url' => 'https://github.com/johndoe/project-one',
                'slug' => 'project-one',
                'thumbnail' => 'path/to/thumbnail1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project Two',
                'description' => 'This is a description for Project Two.',
                'date' => '2024-02-01',
                'url' => 'https://github.com/johndoe/project-two',
                'slug' => 'project-two',
                'thumbnail' => 'path/to/thumbnail2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
