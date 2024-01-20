<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeviceModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            DB::table('device_models')->insert([
                'id' => $i,
                'title' => 'title_' . Str::random(10),
                'name' => 'A10' . $i,
                'image_url' => 'images/device-models/' . $i . '.png',
                'description' => 'description_' . Str::random(100),
            ]);
        }
    }
}
