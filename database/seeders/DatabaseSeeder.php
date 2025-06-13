<?php

namespace Database\Seeders;

use App\Models\Kanban;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        });
    }
}
