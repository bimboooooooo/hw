<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::factory()
            ->count(10)
            ->create()->each(function ($user){
                $user->assignRole('user');
            });

        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'number' => '099999999999',
            'password' => Hash::make('123456'),
        ])->assignRole('admin');
    }
}
