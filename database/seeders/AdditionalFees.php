<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdditionalFees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('additional_fees')->insert([
            'label' => 'default',
            'cost' => '0',
        ]);
        DB::table('additional_fees')->insert([
            'label' => 'Application for Admission',
            'cost' => '100.00',
        ]);
        DB::table('additional_fees')->insert([
            'label' => 'Late Enrollment',
            'cost' => '100.00',
        ]);
        DB::table('additional_fees')->insert([
            'label' => 'Re-Admission Fee',
            'cost' => '500.00',
        ]);
        DB::table('additional_fees')->insert([
            'label' => 'Residence Fee TW',
            'cost' => '1200.00',
        ]);
        DB::table('additional_fees')->insert([
            'label' => 'Residence Fee Dissertation Writing',
            'cost' => '1500.00',
        ]);
        DB::table('additional_fees')->insert([
            'label' => 'Overhead Cost',
            'cost' => '8500.00',
        ]);
    }
}
