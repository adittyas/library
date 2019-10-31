<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create roles and assign created permissions

        // this can be done as separate statements
        $master = Role::create(['name' => 'master']);
        $admin = Role::create(['name' => 'admin']);

        $user = User::create([
            'name' => 'master001',
            'email' => 'master001@library.test',
            'password' => Hash::make('password'),
            'api_token' => Str::random(80),
            'email_verified_at' => now()
        ]);

        $user->assignRole($master);
    }
}