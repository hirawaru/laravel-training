<?php

namespace Database\Seeders;

use App\Models\Task;
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
        $task = new Task();
        $task->name = 'Test Task';
        $task->user_id = 1;
        $task->save();

        $task2 = new Task();
        $task2->name = 'Test Task 2';
        $task2->user_id = 2;
        $task2->save();

        $task3 = new Task();
        $task3->name = 'Test Task 3';
        $task3->user_id = 3;
        $task3->save();
    }
}
