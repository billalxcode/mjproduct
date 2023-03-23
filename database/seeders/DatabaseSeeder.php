<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Laravolt\Avatar\Avatar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user   = $this->command->ask('Do you want seed user table? (Y/n) ');
        $category = $this->command->ask('Do you want seed category table? (Y/n) ');
        $article = $this->command->ask('Do you want seed article table? (Y/n) ');
        
        if (strtolower($user) == "y") {
            $this->call(UserSeeder::class);
        }
        
        if (strtolower($category) == "y") {
            $this->call(CategorySeeder::class);
        }

        if (strtolower($article) == "y") {
            $this->call(BlogSeeder::class);
        }
    }
}
