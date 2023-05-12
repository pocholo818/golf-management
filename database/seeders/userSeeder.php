<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'Admin Person',
                'email' => 'admin@test.com',
                'email_verified_at' => now(),
                'account_code'=> strtoupper(Str::random(10)),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 'admin'
            ],
            [
                'name' => 'Figure Finance',
                'email' => 'finance@test.com',
                'email_verified_at' => now(),
                'account_code'=> strtoupper(Str::random(10)),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 'finance'
            ],
            [
                'name' => 'Kioskman',
                'email' => 'kiosk@test.com',
                'email_verified_at' => now(),
                'account_code'=> strtoupper(Str::random(10)),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 'kiosk'
            ],
            [
                'name' => 'Merchandise Creature',
                'email' => 'merchandise@test.com',
                'email_verified_at' => now(),
                'account_code'=> strtoupper(Str::random(10)),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 'merchandise'
            ],
            [
                'name' => 'Service Fellow',
                'email' => 'service@test.com',
                'email_verified_at' => now(),
                'account_code'=> strtoupper(Str::random(10)),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 'service'
            ],
        ]);
    }
}
