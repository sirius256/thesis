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
         DB::table('device_models')->insert([
             'id' => 1,
             'title' => 'A101',
             'name' => 'A101',
             'image_url' => 'images/device-models/1.png',
             'description' => 'Пристрій побудований на базі Raspberry PI 4 Model B 8 GB і камері 12mp. Фото будуть надіслані на сервер, де ви зможете їх переглянути.',
         ]);

         DB::table('device_models')->insert([
             'id' => 2,
             'title' => 'A102',
             'name' => 'A102',
             'image_url' => 'images/device-models/inDevelop.png',
             'description' => 'В майбутній розробці.',
         ]);

         DB::table('device_models')->insert([
             'id' => 3,
             'title' => 'A103',
             'name' => 'A103',
             'image_url' => 'images/device-models/inDevelop.png',
             'description' => 'В майбутній розробці.',
         ]);

         DB::table('device_models')->insert([
             'id' => 4,
             'title' => 'A104',
             'name' => 'A104',
             'image_url' => 'images/device-models/inDevelop.png',
             'description' => 'В майбутній розробці.',
         ]);
    }
}
