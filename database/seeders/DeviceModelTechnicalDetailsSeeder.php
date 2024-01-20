<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceModelTechnicalDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('device_model_technical_details')->insert([
            'model_id' => 1,
            'name' => 'camera',
            'label' => 'Камера',
            'value' => 'Камера Raspberry Pi V3 12 MP',
        ]);

        DB::table('device_model_technical_details')->insert([
            'model_id' => 1,
            'name' => 'chip',
            'label' => 'Чіпу',
            'value' => 'Raspberry PI 4 Model B 8 GB',
        ]);

        DB::table('device_model_technical_details')->insert([
            'model_id' => 1,
            'name' => 'color',
            'label' => 'колір',
            'value' => 'Білий',
        ]);
    }
}
