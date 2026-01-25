<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view dashboard',

            // Pasien & Pelayanan
            'manage patients',
            'manage visits',
            'manage medical records',

            // Farmasi
            'manage pharmacy',

            // Keuangan
            'manage billing',
            'manage cashier',

            // HR
            'manage employees',
            'manage payroll',

            // Inventory
            'manage inventory',

            // Sistem
            'manage users',
            'manage roles',

            // Executive
            'view executive dashboard'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roles = [
            'Super Admin',
            'Admin',
            'Dokter',
            'Perawat',
            'Farmasi',
            'Finance',
            'HRD',
            'Direksi',
            'IT Support'
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        Role::findByName('Super Admin')->givePermissionTo(Permission::all());

        Role::findByName('Admin')->givePermissionTo([
            'view dashboard',
            'manage patients',
            'manage visits',
            'manage billing',
            'manage inventory'
        ]);

        Role::findByName('Dokter')->givePermissionTo([
            'manage medical records',
            'manage visits'
        ]);

        Role::findByName('Perawat')->givePermissionTo([
            'manage visits',
            'manage medical records'
        ]);

        Role::findByName('Farmasi')->givePermissionTo([
            'manage pharmacy'
        ]);

        Role::findByName('Finance')->givePermissionTo([
            'manage billing',
            'manage cashier'
        ]);

        Role::findByName('HRD')->givePermissionTo([
            'manage employees',
            'manage payroll'
        ]);

        Role::findByName('Direksi')->givePermissionTo([
            'view executive dashboard'
        ]);
    }
}
