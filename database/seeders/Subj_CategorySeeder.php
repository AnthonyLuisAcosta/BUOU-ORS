<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Subj_CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'category' => 'Major Courses',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            
        ]);

        DB::table('category')->insert([
            'category' => 'Thesis Courses',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            
        ]);

        DB::table('category')->insert([
            'category' => 'Foundation Courses',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            
        ]);

        DB::table('category')->insert([
            'category' => 'Cognate',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            
        ]);

        
    }
}
