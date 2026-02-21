<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ha többször futtatod, ne csináljon duplikációt
        User::firstOrCreate(
            ['email' => 'admin@muravendeghaz.hu'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password')
            ]
        );
    }
}