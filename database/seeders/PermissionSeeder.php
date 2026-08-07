<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => 'view-permissions']);
        Permission::firstOrCreate(['name' => 'add-permissions']);
        Permission::firstOrCreate(['name' => 'edit-permissions']);
        Permission::firstOrCreate(['name' => 'delete-permissions']);
        Permission::firstOrCreate(['name' => 'view-roles']);
        Permission::firstOrCreate(['name' => 'add-roles']);
        Permission::firstOrCreate(['name' => 'edit-roles']);
        Permission::firstOrCreate(['name' => 'delete-roles']);
        Permission::firstOrCreate(['name' => 'toggle-permissions']);
        Permission::firstOrCreate(['name' => 'view-users']);
        Permission::firstOrCreate(['name' => 'add-users']);
        Permission::firstOrCreate(['name' => 'edit-users']);
        Permission::firstOrCreate(['name' => 'delete-users']);
        Permission::firstOrCreate(['name' => 'force-logout-users']);
        // Permission::firstOrCreate(['name' => 'view-services']);
        // Permission::firstOrCreate(['name' => 'add-services']);
        // Permission::firstOrCreate(['name' => 'edit-services']);
        // Permission::firstOrCreate(['name' => 'delete-services']);
        Permission::firstOrCreate(['name' => 'view-admin-dashboard']);
        Permission::firstOrCreate(['name' => 'manage-business-sale-flow']);
        Permission::firstOrCreate(['name' => 'manage-business-purchase-flow']);
        Permission::firstOrCreate(['name' => 'manage-business-evaluation']);
        Permission::firstOrCreate(['name' => 'manage-visa-services']);
        Permission::firstOrCreate(['name' => 'manage-franchise-services']);
        Permission::firstOrCreate(['name' => 'manage-blog-categories']);
        Permission::firstOrCreate(['name' => 'manage-blogs']);
        Permission::firstOrCreate(['name' => 'manage-content']);
    }
}
