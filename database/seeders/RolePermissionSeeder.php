<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            // User management
            'view users',
            'create users',
            'edit users',
            'delete users',
            
            // Role management
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            
            // Permission management
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            
            // Cashier specific permissions
            'process transactions',
            'view transactions',
            'create transactions',
            'edit transactions',
            
            // Supervisor specific permissions
            'view reports',
            'generate reports',
            'manage inventory',
            'approve transactions',
            
            // Administrator specific permissions
            'manage system',
            'view all data',
            'manage settings',
            'backup data',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $cashierRole = Role::create(['name' => 'cashier']);
        $supervisorRole = Role::create(['name' => 'supervisor']);
        $administratorRole = Role::create(['name' => 'administrator']);

        // Assign permissions to cashier role
        $cashierPermissions = [
            'process transactions',
            'view transactions',
            'create transactions',
            'edit transactions',
        ];
        $cashierRole->givePermissionTo($cashierPermissions);

        // Assign permissions to supervisor role
        $supervisorPermissions = [
            'view users',
            'edit users',
            'view reports',
            'generate reports',
            'manage inventory',
            'approve transactions',
            'process transactions',
            'view transactions',
            'create transactions',
            'edit transactions',
        ];
        $supervisorRole->givePermissionTo($supervisorPermissions);

        // Assign permissions to administrator role (all permissions)
        $administratorRole->givePermissionTo(Permission::all());

        // Create default users for each role
        $this->createDefaultUsers();
    }

    private function createDefaultUsers(): void
    {
        // Create administrator user
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('administrator');

        // Create supervisor user
        $supervisor = User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@example.com',
            'password' => Hash::make('password'),
        ]);
        $supervisor->assignRole('supervisor');

        // Create cashier user
        $cashier = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@example.com',
            'password' => Hash::make('password'),
        ]);
        $cashier->assignRole('cashier');
    }
}