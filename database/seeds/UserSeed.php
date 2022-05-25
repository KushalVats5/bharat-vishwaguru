<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /* public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@getnada.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Manoj Kumar',
            'email' => 'manoj@getnada.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('user');
    } */
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions for roles
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        // create permissions for permissions
        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'delete permissions']);

        // create permissions for users
        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // create permissions for articles
        Permission::create(['name' => 'list articles']);
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create permissions for pages
        Permission::create(['name' => 'list pages']);
        Permission::create(['name' => 'create pages']);
        Permission::create(['name' => 'edit pages']);
        Permission::create(['name' => 'delete pages']);
        Permission::create(['name' => 'publish pages']);
        Permission::create(['name' => 'unpublish pages']);

        // create permissions for users

        // create roles and assign existing permissions for write
        $role1 = Role::create(['name' => 'freelancer']);

        $role1->givePermissionTo('list articles');
        $role1->givePermissionTo('create articles');
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');
        $role1->givePermissionTo('publish articles');
        $role1->givePermissionTo('unpublish articles');

        $role1->givePermissionTo('list pages');
        $role1->givePermissionTo('create pages');
        $role1->givePermissionTo('edit pages');
        $role1->givePermissionTo('delete pages');
        $role1->givePermissionTo('publish pages');
        $role1->givePermissionTo('unpublish pages');

        // create roles and assign existing permissions for admin
        $role2 = Role::create(['name' => 'admin']);

        $role2->givePermissionTo('list roles');
        $role2->givePermissionTo('create roles');
        $role2->givePermissionTo('edit roles');
        $role2->givePermissionTo('delete roles');

        $role2->givePermissionTo('list users');
        $role2->givePermissionTo('create users');
        $role2->givePermissionTo('edit users');
        $role2->givePermissionTo('delete users');

        $role2->givePermissionTo('list articles');
        $role2->givePermissionTo('create articles');
        $role2->givePermissionTo('edit articles');
        $role2->givePermissionTo('delete articles');
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');

        $role2->givePermissionTo('list pages');
        $role2->givePermissionTo('create pages');
        $role2->givePermissionTo('edit pages');
        $role2->givePermissionTo('delete pages');
        $role2->givePermissionTo('publish pages');
        $role2->givePermissionTo('unpublish pages');

        // create roles and assign existing permissions for user
        $role3 = Role::create(['name' => 'user']);

        // create roles and assign existing permissions for super admin
        $role4 = Role::create(['name' => 'super-admin']);
        $role4->givePermissionTo('list roles');
        $role4->givePermissionTo('create roles');
        $role4->givePermissionTo('edit roles');
        $role4->givePermissionTo('delete roles');

        $role4->givePermissionTo('list users');
        $role4->givePermissionTo('create users');
        $role4->givePermissionTo('edit users');
        $role4->givePermissionTo('delete users');

        $role4->givePermissionTo('list articles');
        $role4->givePermissionTo('create articles');
        $role4->givePermissionTo('edit articles');
        $role4->givePermissionTo('delete articles');
        $role4->givePermissionTo('publish articles');
        $role4->givePermissionTo('unpublish articles');

        $role4->givePermissionTo('list pages');
        $role4->givePermissionTo('create pages');
        $role4->givePermissionTo('edit pages');
        $role4->givePermissionTo('delete pages');
        $role4->givePermissionTo('publish pages');
        $role4->givePermissionTo('unpublish pages');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\User::create([
            'name' => 'Example Writer User',
            'email' => 'writer@getnada.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($role1);

        $user = \App\User::create([
            'name' => 'Example Admin User',
            'email' => 'admin@getnada.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($role2);

        $user = \App\User::create([
            'name' => 'Example User',
            'email' => 'user@getnada.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($role3);

        $user = \App\User::create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@getnada.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($role4);
    }
}