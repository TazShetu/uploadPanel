<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Dummy 1',
            'email' => 'd@g.com',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'sa@g.com',
            'password' => bcrypt('123456789A'),
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'a@g.com',
            'password' => bcrypt('123456789A'),
        ]);
    }
}
