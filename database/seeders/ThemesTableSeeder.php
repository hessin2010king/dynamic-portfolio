<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('themes')->insert([
            [
                'name' => 'Minimalist',
                'css_path' => 'css/themes/minimalist.css',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dark Mode',
                'css_path' => 'css/themes/dark.css',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
