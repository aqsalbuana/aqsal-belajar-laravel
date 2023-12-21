<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(3)->create();
        User::create([
            'name' => 'Super Admin',
            'email' => 'sadmin@gmail.com',
            'phone_number' => '081100000000',
            'username' => 'super.admin',
            'password' => Hash::make('12345'),
            'group_id' => 1,
        ]);
        User::create([
            'name' => 'User AJA',
            'email' => 'user@gmail.com',
            'phone_number' => '081100000001',
            'username' => 'user.aja',
            'password' => Hash::make('12345'),
            'group_id' => 3,
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
