<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'role' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'role' => 'Manajer',
        ]);
        DB::table('roles')->insert([
            'role' => 'Staff',
        ]);
    }
}

