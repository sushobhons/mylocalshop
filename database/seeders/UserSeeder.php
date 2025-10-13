<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'mobile' => '9874979568',
            'email' => 'admin@localshop.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
