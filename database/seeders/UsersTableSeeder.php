<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1234'),
            'is_admin' => true,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'User 1',
            'email' => 'user1@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user1234'),
            'is_admin' => false,
            'remember_token' => Str::random(10),
        ]);
    }
}
