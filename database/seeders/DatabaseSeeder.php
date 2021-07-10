<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
        ]);
        $this->call(CustomizedPermissionsTableSeeder::class);
        $this->call(CustomizedRolesTableSeeder::class);
        $this->call(CustomizedPermissionRoleTableSeeder::class);
        $this->call(CustomizedUsersTableSeeder::class);
        $this->call(CustomizedRoleUserTableSeeder::class);
    }
}
