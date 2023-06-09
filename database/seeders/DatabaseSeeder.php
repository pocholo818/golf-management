<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin Person',
        //     'email' => 'admin@test.com',
        //     'email_verified_at' => now(),
        //     'account_code'=> strtoupper(Str::random(10)),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'role' => 'admin'
        // ]);

        $this->call([
            courseSeeder::class,
            customerSeeder::class,
            userSeeder::class,
        ]);
    }
}
