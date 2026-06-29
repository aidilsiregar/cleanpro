<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'manage bookings',
            'manage services',
            'manage users',
            'manage attendances',
            'manage reports',
            'manage articles',
            'manage reviews'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles with permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $petugas = Role::create(['name' => 'petugas']);
        $petugas->givePermissionTo([
            'manage attendances',
            'manage bookings'
        ]);

        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo([
            'manage bookings',
            'manage reviews'
        ]);
    }
}