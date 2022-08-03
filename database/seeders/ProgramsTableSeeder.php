<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            'id' => '1',
            'code' => 'MM',
            'description' => 'Master in Management',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('programs')->insert([
            'id' => '2',
            'code' => 'MLGM',
            'description' => 'Master in Local Government Management',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('programs')->insert([
            'id' => '3',
            'code' => 'MPA',
            'description' => 'Master of Public Administration',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('programs')->insert([
            'id' => '4',
            'code' => 'MAELM',
            'description' => 'Master in Education Leadership Management',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('programs')->insert([
            'id' => '5',
            'code' => 'MAEngEd',
            'description' => 'Master of Arts in English Education',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('programs')->insert([
            'id' => '6',
            'code' => 'MASocStEd',
            'description' => 'Master of Arts in Social Studies Education',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('programs')->insert([
            'id' => '7',
            'code' => 'EdDELM',
            'description' => 'Doctor of Education in Educational Leadership and Management',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('programs')->insert([
            'id' => '8',
            'code' => 'BSDevCom',
            'description' => 'Bachelor of Science in Development Communication',
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
