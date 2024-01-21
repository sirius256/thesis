<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('devices')->insert([
                'name' => 'Мій дівайс',
                'model_id' => 1,
                'hash' => Str::random(16) . 1 . $i,
                'owner_user_id' => null,
            ]);
        }
    }
}
