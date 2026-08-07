<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Michel',
                'email' => 'mike@infinitybusinessbrokers.com',
                'password' => \Hash::make('Hello123'),
                'email_verified_at' => now()
            ]
        ];

        // Insert users into the database
        foreach ($users as $userData) {
            $user = User::create($userData);

            // Assign the "super-admin" role to the user
            $superAdminRole = Role::where('name', 'super-admin')->first();
            if ($superAdminRole) {
                $user->assignRole($superAdminRole);

                // If you have specific permissions to assign, you can do so here
                //$permissions = Permission::all();
                //$superAdminRole->syncPermissions($permissions);
            }
        }

    }
}
