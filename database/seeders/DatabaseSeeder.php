<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles first
        Role::insert([
            ['name' => 'admin'],
            ['name' => 'driver'],
        ]);

        // Fetch the 'admin' role
        $adminRole = Role::where('name', 'admin')->first();

        // Create a user with the 'admin' role
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => $adminRole->id,  // Assign the admin role
        ]);
    }
}
