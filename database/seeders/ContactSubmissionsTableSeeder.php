<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSubmissionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('contact_submissions')->insert([
            [
                'name' => 'Jane Doe',
                'email' => 'jane.doe@example.com',
                'message' => 'I would like to collaborate on a project.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Brown',
                'email' => 'michael.brown@example.com',
                'message' => 'I am interested in your services.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
