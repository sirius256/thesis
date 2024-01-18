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
        $modelsCount = 4;
        for ($i = 1; $i <= 10; $i++) {
            $modelId = $i;

            if ($modelId > $modelsCount) {
                $modelId =  $i % $modelsCount;
            }
            if ($modelId === 0) {
                $modelId = 1;
            }
            DB::table('devices')->insert([
                'name' => 'user_name_' . Str::random(10),
                'model_id' => $modelId,
                'hash' => Str::random(10),
                'owner_user_id' => 1,
            ]);

            DB::table('devices')->insert([
                'name' => 'user_name_' . Str::random(10),
                'model_id' => 1,
                'hash' => Str::random(10),
                'owner_user_id' => null,
            ]);
        }
    }
}
