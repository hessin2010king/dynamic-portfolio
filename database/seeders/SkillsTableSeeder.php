<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('skills')->insert([
            [
                'name' => 'PHP',
                'percentage' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laravel',
                'percentage' => 85,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'JavaScript',
                'percentage' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'React',
                'percentage' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
