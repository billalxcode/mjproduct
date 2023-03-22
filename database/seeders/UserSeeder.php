<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravolt\Avatar\Avatar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = User::whereEmail('admin@admin.com')->exists();

        if (!$email) {
            $avatar = new Avatar();
            $avatar->create('Super Admin');
            
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('admin1234'),
                'avatar'    => $avatar->toBase64()
            ]);
        }
    }
}
