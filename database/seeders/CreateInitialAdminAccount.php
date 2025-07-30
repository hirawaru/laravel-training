<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateInitialAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::unguard();
        User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_active' => true,
            'username' => 'admin',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'name' => 'Admin User',
            'is_admin' => true,
        ]);
    }
}
