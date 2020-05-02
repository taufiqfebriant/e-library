<?php

use App\Role;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole  = Role::where('name', 'admin')->first();
        $memberRole   = Role::where('name', 'member')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'whatsapp' => '082335623028',
            'facebook' => 'dafrin maulana',
            'twitter'   => 'dafrintweet',
            'instagram' => 'www.instagram.com'
        ]);
        $member = User::create([
            'name' => 'Member',
            'email' => 'member@member.com',
            'password' => Hash::make('password'),
            'whatsapp' => '082335623658',
            'facebook' => 'taufiq',
            'twitter'   => 'taufiqtwitter',
            'instagram' => 'www.instagram.com'
        ]);

        $admin->roles()->attach($adminRole);
        $member->roles()->attach($memberRole);
    }
}
