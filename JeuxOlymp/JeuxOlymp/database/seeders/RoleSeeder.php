<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Role::count() > 0) {
            return;
        }
        $roles = [
            ['name' => 'administrateur'],
            ['name' => 'organisateur'],
            ['name' => 'joueur'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
