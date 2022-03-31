<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',

            'order-list',
            'order-create',
            'order-edit',
            'order-delete',

            'report-list',
            'report-create',
            'report-edit',
            'report-delete',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            'inventory-list',
            'inventory-create',
            'inventory-edit',
            'inventory-delete',

            'game-list',
            'game-create',
            'game-edit',
            'game-delete',

            'device-list',
            'device-create',
            'device-edit',
            'device-delete',

            'partner-list',
            'partner-create',
            'partner-edit',
            'partner-delete',

            'client-list',
            'client-create',
            'client-edit',
            'client-delete',

            'locator-list',
            'locator-create',
            'locator-edit',
            'locator-delete',

            'reading-list',
            'reading-create',
            'reading-edit',
            'reading-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
