<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        $admin_role = Role::firstOrCreate(['name' => 'Admin']);

        $admin->assignRole($admin_role);

        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        $customer_role = Role::firstOrCreate(['name' => 'Customer']);

        $customer->assignRole($customer_role);

        Permission::insert([
            [
                'name' => 'create_ticket',
                'guard_name' => 'web',
            ],
            [
                'name' => 'respond_ticket',
                'guard_name' => 'web',
            ],
        ]);

        $admin_role->givePermissionTo('respond_ticket');

        $customer_role->givePermissionTo('create_ticket');
    }
}
