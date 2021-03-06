<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'role' => 1,
            'phone' => Str::random(10),
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Vendor Account',
            'res_name' => 'Foods Incubator Limited',
            'email' => 'vendor@mail.com',
            'role' => 2,
            'phone' => Str::random(10),
            'trade_license' => Str::random(8),
            'country' => 'Saudi Arabia',
            'city' => 'Riyadh',
            'location' => 'Road:00, Tower:00, Building',
            'email_verified_at' => now(),
            'password' => Hash::make('vendor'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Mr John',
            'email' => 'user@mail.com',
            'role' => 3,
            'phone' => Str::random(10),
            'email_verified_at' => now(),
            'password' => Hash::make('user'),
            'remember_token' => Str::random(10),
        ]);
    }
}
