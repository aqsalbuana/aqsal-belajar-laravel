<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserGroup::create([
            'group_name' => 'Super Admin',
            'description' => 'Group User Super Admin'
        ]);
        UserGroup::create([
            'group_name' => 'Seller',
            'description' => 'Group User Seller'
        ]);
        UserGroup::create([
            'group_name' => 'Admin Products',
            'description' => 'Group User Admin Products'
        ]);
    }
}
