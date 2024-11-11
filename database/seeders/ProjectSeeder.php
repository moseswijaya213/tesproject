<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('p_project')->insert([
            'project_name' => 'Mall Of Indonesia',
            'project_code' => 'MOI',
            'perusahaan' => 'Mall Indo',
            'pic' => 'Moses',
            'bidang_usaha' => 'Mall',
            'alamat' => 'Jakarta Utara',
            'sistem_operasional' => 'Full Manless',
        ]);
        DB::table('p_project')->insert([
            'project_name' => 'Grand Indonesia',
            'project_code' => 'GI',
            'perusahaan' => 'Grand Indo',
            'pic' => 'Moses',
            'bidang_usaha' => 'Mall',
            'alamat' => 'Jakarta Pusat',
            'sistem_operasional' => 'Full Manless',
        ]);
        DB::table('p_project')->insert([
            'project_name' => 'Bina Nusantara University',
            'project_code' => 'BINUS',
            'perusahaan' => 'Bina Nusantara',
            'pic' => 'Moses',
            'bidang_usaha' => 'Education',
            'alamat' => 'Jakarta Barat',
            'sistem_operasional' => 'Full Manless',
        ]);
    }
}

