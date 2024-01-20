<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('device_settings')->insert([
            'model_id' => 1,
            'name' => 'photo_extension',
            'label' => 'Photo extension',
            'value' => 'jpg',
        ]);
    }
}
