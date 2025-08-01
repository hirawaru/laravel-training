<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([CreateInitialAdminAccount::class]);


        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
        $user = new User();
        $user->first_name = 'Test User 2';
        $user->last_name = 'Doe';
        $user->email = 'test2@example.com';
        $user->password = bcrypt('password');
        $user->is_active = true;
        $user->is_admin = true;
        $user->save();
    }
}
