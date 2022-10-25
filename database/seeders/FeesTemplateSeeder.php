<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeesTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Masteral rates
        //3 units
        DB::table('fees_template')->insert(
            [
                'type' => 'Masteral',
                'units' => '3.00',
                'admission' => '100.00',
                'tuition' => '1200.00',
                'matricula' => '75.00',
                'medical' => '100.00',
                'library' => '300.00',
                'athletic' => '100.00',
                'cultural' => '150.00',
                'guidance' => '50.00',
                'scuaa' => '50.00',
                'distLearn' => '1500.00',
                'total' => '3625.00',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        //6 units
        DB::table('fees_template')->insert(
            [
                'type' => 'Masteral',
                'units' => '6.00',
                'admission' => '100.00',
                'tuition' => '2400.00',
                'matricula' => '75.00',
                'medical' => '100.00',
                'library' => '300.00',
                'athletic' => '100.00',
                'cultural' => '150.00',
                'guidance' => '50.00',
                'scuaa' => '50.00',
                'distLearn' => '1500.00',
                'total' => '4825.00',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        //9 units
        DB::table('fees_template')->insert(
            [
                'type' => 'Masteral',
                'units' => '9.00',
                'admission' => '100.00',
                'tuition' => '3600.00',
                'matricula' => '75.00',
                'medical' => '100.00',
                'library' => '300.00',
                'athletic' => '100.00',
                'cultural' => '150.00',
                'guidance' => '50.00',
                'scuaa' => '50.00',
                'distLearn' => '1500.00',
                'total' => '6025.00',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        //12 units
        DB::table('fees_template')->insert(
            [
                'type' => 'Masteral',
                'units' => '12.00',
                'admission' => '100.00',
                'tuition' => '4800.00',
                'matricula' => '75.00',
                'medical' => '100.00',
                'library' => '300.00',
                'athletic' => '100.00',
                'cultural' => '150.00',
                'guidance' => '50.00',
                'scuaa' => '50.00',
                'distLearn' => '1500.00',
                'total' => '7225.00',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        //Doctoral rates
        //3 units
        DB::table('fees_template')->insert(
            [
                'type' => 'Doctoral',
                'units' => '3.00',
                'admission' => '100.00',
                'tuition' => '1500.00',
                'matricula' => '75.00',
                'medical' => '100.00',
                'library' => '500.00',
                'athletic' => '100.00',
                'cultural' => '150.00',
                'guidance' => '50.00',
                'scuaa' => '50.00',
                'distLearn' => '1500.00',
                'total' => '4125.00',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        //6 units
        DB::table('fees_template')->insert(
            [
                'type' => 'Doctoral',
                'units' => '6.00',
                'admission' => '100.00',
                'tuition' => '3000.00',
                'matricula' => '75.00',
                'medical' => '100.00',
                'library' => '500.00',
                'athletic' => '100.00',
                'cultural' => '150.00',
                'guidance' => '50.00',
                'scuaa' => '50.00',
                'distLearn' => '1500.00',
                'total' => '5625.00',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        //9 units
        DB::table('fees_template')->insert(
            [
                'type' => 'Doctoral',
                'units' => '9.00',
                'admission' => '100.00',
                'tuition' => '4500.00',
                'matricula' => '75.00',
                'medical' => '100.00',
                'library' => '500.00',
                'athletic' => '100.00',
                'cultural' => '150.00',
                'guidance' => '50.00',
                'scuaa' => '50.00',
                'distLearn' => '1500.00',
                'total' => '7125.00',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
        //12 units
        DB::table('fees_template')->insert(
            [
                'type' => 'Doctoral',
                'units' => '12.00',
                'admission' => '100.00',
                'tuition' => '6000.00',
                'matricula' => '75.00',
                'medical' => '100.00',
                'library' => '500.00',
                'athletic' => '100.00',
                'cultural' => '150.00',
                'guidance' => '50.00',
                'scuaa' => '50.00',
                'distLearn' => '1500.00',
                'total' => '8625.00',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );
    }
}
