<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Division;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('role', 'Admin')->first();
        $division = Division::where('division', 'IT')->first();

        DB::table('users')->insert([
            'name' => 'Moses',
            'email' => 'moses@gmail.com',
            'password' => Hash::make('moses123'),
            'role' => $role->role,
            'division' => $division->division,
        ]);
    }
}

