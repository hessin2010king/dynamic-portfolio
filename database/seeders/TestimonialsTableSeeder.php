<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('testimonials')->insert([
            [
                'name' => 'Alice Smith',
                'position' => 'CEO',
                'company' => 'Example Corp',
                'quote' => 'John is a fantastic developer who exceeded our expectations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Johnson',
                'position' => 'CTO',
                'company' => 'Tech Solutions',
                'quote' => 'Highly recommend John for his skills and dedication.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
