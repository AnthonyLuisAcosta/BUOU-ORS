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
            /*'term' =>'2022-2023, 1st Sem',*/
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
