<?php

namespace Database\Seeders;

use App\Models\Kanban;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ruxury',
            'email' => 'ruxury.gamer@gmail.com',
            'password' => 'sK7DjZ1&se^Ud0vfgb!B',
        ]);

        User::factory()->create([
            'name' => 'Ayam',
            'email' => 'ayam@example.com',
            'password' => 'MTbaXnHchX.uy5v',
        ]);
        User::factory(10)->create();

        $kanbans = Kanban::factory(10)->create();
        $users = User::all();

        // Assign each kanban some random users as members
        $kanbans->each(function (Kanban $kanban) use ($users) {
            // Get some random users (1-3) to be members, excluding the owner
            $members = $users->where('id', '!=', $kanban->user_id)
                ->random(rand(3, min(3, $users->count() - 1)));

            // Attach the members to the kanban
            $kanban->members()->attach($members->pluck('id')->toArray());

            // Create 5-10 tasks for each kanban
            $tasks = Task::factory(rand(5, 10))->create([
                'kanban_id' => $kanban->id
            ]);

            // Assign 1-3 users to each task
            $tasks->each(function (Task $task) use ($members, $kanban) {
                // Include the creator in the pool of possible assignees
                $possibleAssignees = $members->push($kanban->user)->unique('id');

                // Get 1-3 random users from the combined pool
                $taskUsers = $possibleAssignees->random(rand(1, min(3, $possibleAssignees->count())));

                // Assign the selected users to the task
                $task->users()->attach($taskUsers->pluck('id')->toArray());
            });
        });
    }
}
