<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name' => 'Admin',
            'slug' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now()->today(),
            'password' => Hash::make('12345678')
        ]);
    }
}
