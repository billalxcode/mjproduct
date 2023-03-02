<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email = User::whereEmail('admin@admin.com')->exists();

        if (!$email) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('admin1234')
            ]);
        }

        $this->call([
            CategorySeeder::class,
            BlogSeeder::class
        ]);
    }
}
