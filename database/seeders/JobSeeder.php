<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Company;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();
        $users = User::all();
        $categories = Category::all();

        if ($companies->isEmpty() || $users->isEmpty() || $categories->isEmpty()) {
            return;
        }

        // Create 20 jobs
        Job::factory(20)->make()->each(function ($job) use ($companies, $users, $categories) {
            $job->company_id = $companies->random()->id;
            $job->user_id = $users->random()->id;
            $job->save();

            // Assign 1-3 random categories
            $job->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
