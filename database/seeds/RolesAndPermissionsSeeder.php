<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Profile;

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
            'first_name' => 'super',
            'last_name' => 'master',
            'id_employee' => '0001',
            'email' => 'master@library.test',
            'password' => Hash::make('password'),
            // 'api_token' => hash('sha256',Str::random(80)),
            'api_token' => Str::random(80),
            'email_verified_at' => now(),
            'role' => 'master'
        ]);
        $userProfile = Profile::create([
            'user_id' => $user->id,
            'address' => 'KP Sawah',
            'province' => 'Jawa Barat',
            'district' => 'Kota Bekasi',
            'sub_district' => 'Pondokmelati',
            'urban_village' => 'Jatimelati',
            'postal_code' => '11111',
            'contact' => '123456789',
            'about' => 'I am the master',
        ]);

        $user2 =  User::create([
            'first_name' => 'aditya',
            'last_name' => 'sandy',
            'id_employee' => '0002',
            'email' => 'aditya@library.test',
            'password' => Hash::make('password'),
            // 'api_token' => hash('sha256',Str::random(80)),
            'api_token' => Str::random(80),
            'email_verified_at' => now(),
            'role' => 'admin'
        ]);
        $user2Profile = Profile::create([
            'user_id' => $user2->id,
            'address' => 'KP Sawah',
            'province' => 'Jawa Barat',
            'district' => 'Kota Bekasi',
            'sub_district' => 'Pondokmelati',
            'urban_village' => 'Jatimelati',
            'postal_code' => '11111',
            'contact' => '123456789',
            'about' => 'I am the admin',
        ]);

        $user->assignRole($master);
        $user2->assignRole($admin);
    }
}