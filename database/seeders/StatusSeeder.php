<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'name' => Status::ORDER_STATUS_NEW,
            'group_name' => Status::ORDER_STATUSES_GROUP,
        ]);
        DB::table('statuses')->insert([
            'name' => Status::ORDER_STATUS_COMPLETE,
            'group_name' => Status::ORDER_STATUSES_GROUP,
        ]);
        DB::table('statuses')->insert([
            'name' => Status::ORDER_STATUS_IN_PROGRESS,
            'group_name' => Status::ORDER_STATUSES_GROUP,
        ]);
    }
}
