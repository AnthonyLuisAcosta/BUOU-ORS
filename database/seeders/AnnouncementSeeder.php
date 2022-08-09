<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('announcement')->insert(
            [
                'title' => 'default',
                'field'  => 'Welcome to BUOU Online Admission System The 1st Semester 2022-2023 admission for BUOU programs is until May 15, 2022.',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
    }
}
