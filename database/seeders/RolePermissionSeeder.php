<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat permissions
        $permissions = [
            'manage fields',
            'manage bookings',
            'manage timeslot',
            'manage payment',
            'view timeslot',
            'view fields',
            'view bookings',
            'create bookings',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Membuat roles dan memberikan permissions
        $adminRole = Role::create(['name' => 'admin']);
        $customerRole = Role::create(['name' => 'customer']);

        // Memberikan semua permissions kepada admin
        $adminRole->givePermissionTo(Permission::all());

        // Memberikan permissions tertentu kepada user
        $customerRole->givePermissionTo(['view fields', 'view timeslot', 'create bookings', 'view bookings']);

        // Membuat user admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '1234567890',
        ]);

        // Memberikan role admin kepada user
        $admin->assignRole($adminRole);
    }
}
