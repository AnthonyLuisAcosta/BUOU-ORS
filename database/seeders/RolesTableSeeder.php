<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'role_slug' => 'admin',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Registrar',
            'role_slug' => 'registrar',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Dean',
            'role_slug' => 'dean',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Program Adviser',
            'role_slug' => 'programAdviser',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Applicant',
            'role_slug' => 'applicant',
        ]);
    }
}
