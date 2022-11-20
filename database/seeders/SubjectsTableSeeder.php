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
            'subj_code' => 'MLGM 101',
            'title' => 'Local Governance',
            'cat_id' => '1',
            'programs_id' => '2',
            'prof' => 'Professor A',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MLGM 202',
            'title' => 'Local Government System',
            'cat_id' => '1',
            'programs_id' => '2',
            'prof' => 'Professor A',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MLGM 203',
            'title' => 'Organization and Management',
            'cat_id' => '1',
            'programs_id' => '2',
            'prof' => 'Professor A',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MLGM 214',
            'title' => 'Economics of Local Government',
            'cat_id' => '1',
            'programs_id' => '2',
            'prof' => 'Professor B',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MMOU 202',
            'title' => 'Management of Organization',
            'cat_id' => '1',
            'programs_id' => '1',
            'prof' => 'Professor B',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        
        DB::table('subjects')->insert([
            'subj_code' => 'MMOU 211',
            'title' => 'Human Resource Development and Management',
            'cat_id' => '1',
            'programs_id' => '1',
            'prof' => 'Professor C',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MMOU 213',
            'title' => 'Problem Solving and Decision Making',
            'cat_id' => '1',
            'programs_id' => '1',
            'prof' => 'Professor C',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MPA 202',
            'title' => 'Organization, Management and Leadership',
            'cat_id' => '1',
            'programs_id' => '3',
            'prof' => 'Professor D',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MPA 210',
            'title' => 'Human Resource, Ethics and Accountability',
            'cat_id' => '1',
            'programs_id' => '3',
            'prof' => 'Professor E',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('subjects')->insert([
            'subj_code' => 'MLGM 299',
            'title' => 'Thesis Writing',
            'cat_id' => '2',
            'programs_id' => '2',
            'prof' => 'Professor E',
            'units' => '3.0',
            'term' =>'1',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
