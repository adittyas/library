<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $master = User::create([
        //     'name' => 'master001',
        //     'email' => 'master001@library.test',
        //     'password' => Hash::make('password'),
        //     'api_token' => Str::random(80),
        //     'created_at' => now(),
        //     'email_verified_at' => now()
        // ]);
        // factory(App\User::class, 5)->create();
    }
}
