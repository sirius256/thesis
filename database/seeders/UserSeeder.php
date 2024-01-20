<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user@gmail.com'),
            'role' => User::ROLE_USER,
        ]);

        DB::table('users')->insert([
            'name' => 'moderator',
            'email' => 'moderator@gmail.com',
            'password' => Hash::make('moderator@gmail.com'),
            'role' => User::ROLE_MODERATOR,
        ]);

        for ($i = 0; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => 'name_' . Str::random(10),
                'email' => Str::random(10).'_user@example.com',
                'password' => Hash::make('user@gmail.com'),
                'role' => User::ROLE_USER,
            ]);
        }
    }
}
