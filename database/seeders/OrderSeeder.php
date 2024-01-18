<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('orders')->insert([
                'status_id' => 1,
                'user_id' => 1,
                'device_id' => $i,
                'comment_for_user' => Str::random(100),
                'comment_for_moderator' => Str::random(100),
            ]);
        }
    }
}
