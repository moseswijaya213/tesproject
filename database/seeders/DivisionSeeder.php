<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([
            'division' => 'IT',
        ]);
        DB::table('divisions')->insert([
            'division' => 'Infrastructure',
        ]);
        DB::table('divisions')->insert([
            'division' => 'Design',
        ]);
    }
}

