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
        //
        // DB::table('role_user')->truncate();
        // User::truncate();

        $adminRole = Role::where('name' , 'admin')->first();
        $authorRole = Role::where('name' , 'author')->first();
        $userRole = Role::where('name' , 'user')->first();

        $admin = User::create([
            'name' => 'admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        $author = User::create([
            'name' => 'Author User',
            'email' => 'author@author.com',
            'password' => Hash::make('password')
        ]);
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);


        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
