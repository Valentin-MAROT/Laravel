<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() > 0) {
            return;
        }
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@valentin-marot.com',
            'password' => bcrypt('password'),
            'role' => 'administrateur',
        ]);
    }
}
