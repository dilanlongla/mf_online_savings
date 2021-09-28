<?php

namespace Database\Seeders;

use App\Models\Account;
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
        Permission::create(['name' => 'create accounts', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete accounts', 'guard_name' => 'api']);
        Permission::create(['name' => 'edit accounts', 'guard_name' => 'api']);
        Permission::create(['name' => 'view accounts', 'guard_name' => 'api']);

        // user accounts permissions
        Permission::create(['name' => 'create user accounts', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete user accounts', 'guard_name' => 'api']);
        Permission::create(['name' => 'edit user accounts', 'guard_name' => 'api']);
        Permission::create(['name' => 'view user accounts', 'guard_name' => 'api']);

        // clients permissions
        Permission::create(['name' => 'create clients', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete clients', 'guard_name' => 'api']);
        Permission::create(['name' => 'edit clients', 'guard_name' => 'api']);
        Permission::create(['name' => 'view clients', 'guard_name' => 'api']);

        // agents permissions
        Permission::create(['name' => 'create agents', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete agents', 'guard_name' => 'api']);
        Permission::create(['name' => 'edit agents', 'guard_name' => 'api']);
        Permission::create(['name' => 'view agents', 'guard_name' => 'api']);

        // Depts permissions
        Permission::create(['name' => 'create depts', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete depts', 'guard_name' => 'api']);
        Permission::create(['name' => 'edit depts', 'guard_name' => 'api']);
        Permission::create(['name' => 'view depts', 'guard_name' => 'api']);

        // Transactions permissions
        Permission::create(['name' => 'create transactions', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete transactions', 'guard_name' => 'api']);
        Permission::create(['name' => 'edit transactions', 'guard_name' => 'api']);
        Permission::create(['name' => 'view transactions', 'guard_name' => 'api']);

        // create roles and assign created permissions

        // // this can be done as separate statements
        // $role = Role::create(['name' => 'writer']);
        // $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = Role::create(['name' => 'agent', 'guard_name' => 'api'])
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

        $role = Role::create(['name' => 'client', 'guard_name' => 'api']);

        $role = Role::create(['name' => 'super-admin', 'guard_name' => 'api']);
        $role->givePermissionTo(Permission::all());

        //create types of bank Accounts
        Account::create(['name' => 'Current Account', 'description' => 'for business transactions']);
        Account::create(['name' => 'Savings Account', 'description' => 'for daily savings']);
    }
}
