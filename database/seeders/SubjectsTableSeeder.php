<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'subj_code' => 'MMOU 202',
            'title' => 'Management of Organization',
            'cat_id' => '1',
            'programs_id' => '1',
            'prof' => 'Daniella Pena',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MLGM 202',
            'title' => 'Local Government System',
            'cat_id' => '3',
            'programs_id' => '2',
            'prof' => 'Professor X',
            'units' => '5.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MPA 299',
            'title' => 'Thesis Writing',
            'cat_id' => '2',
            'programs_id' => '3',
            'prof' => 'Professor Y',
            'units' => '1.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MPA 211',
            'title' => 'Local Government',
            'cat_id' => '4',
            'programs_id' => '3',
            'prof' => 'Professor Z',
            'units' => '1.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
