<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['name' => 'Not yet started', 'created_at' => now()],
            ['name' => 'Started', 'created_at' => now()],
            ['name' => 'Completed', 'created_at' => now()],
        ]);
    }
}
