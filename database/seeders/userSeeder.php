<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug','admin')->first();
        // Create admin
        User::updateOrCreate([
            'role_id' => $adminRole->id,
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password')
        ]);

        // Create user
        $userRole = Role::where('slug','user')->first();
        User::updateOrCreate([
            'role_id' => $userRole->id,
            'name' => 'Jone Doe',
            'email' => 'user@mail.com',
            'password' => Hash::make('password')
        ]);
    }
}
