<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'role_id' => '1',
            'first_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('pass@admin'),
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'first_name' => 'Registrar',
            'email' => 'registrar@gmail.com',
            'password' => Hash::make('pass@registrar'),
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'first_name' => 'Dean',
            'email' => 'dean@gmail.com',
            'password' => Hash::make('pass@dean'),
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'role_id' => '4',
            'first_name' => 'Program Adviser',
            'email' => 'adviser@gmail.com',
            'password' => Hash::make('pass@adviser'),
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'role_id' => '5',
            'first_name' => 'Applicant',
            'email' => 'applicant@gmail.com',
            'password' => Hash::make('pass@applicant'),
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
