<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // accounts permissions
        Permission::create(['name' => 'create accounts']);
        Permission::create(['name' => 'delete accounts']);
        Permission::create(['name' => 'edit accounts']);
        Permission::create(['name' => 'view accounts']);

        // user accounts permissions
        Permission::create(['name' => 'create user accounts']);
        Permission::create(['name' => 'delete user accounts']);
        Permission::create(['name' => 'edit user accounts']);
        Permission::create(['name' => 'view user accounts']);

        // clients permissions
        Permission::create(['name' => 'create clients']);
        Permission::create(['name' => 'delete clients']);
        Permission::create(['name' => 'edit clients']);
        Permission::create(['name' => 'view clients']);

        // agents permissions
        Permission::create(['name' => 'create agents']);
        Permission::create(['name' => 'delete agents']);
        Permission::create(['name' => 'edit agents']);
        Permission::create(['name' => 'view agents']);

        // Depts permissions
        Permission::create(['name' => 'create depts']);
        Permission::create(['name' => 'delete depts']);
        Permission::create(['name' => 'edit depts']);
        Permission::create(['name' => 'view depts']);

        // Transactions permissions
        Permission::create(['name' => 'create transactions']);
        Permission::create(['name' => 'delete transactions']);
        Permission::create(['name' => 'edit transactions']);
        Permission::create(['name' => 'view transactions']);

        // create roles and assign created permissions

        // // this can be done as separate statements
        // $role = Role::create(['name' => 'writer']);
        // $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = Role::create(['name' => 'agent'])
            ->givePermissionTo([
                'create transactions',
                'edit transactions',
                'view accounts',
                'create user accounts',
                'edit user accounts',
                'create clients',
                'edit clients',
                'view clients',
            ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
