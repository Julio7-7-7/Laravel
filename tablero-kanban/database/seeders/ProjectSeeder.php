<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();

        Project::factory(5)->create()->each(function ($project) use ($user) {
            $project->users()->attach($user);
        });
    }
}
