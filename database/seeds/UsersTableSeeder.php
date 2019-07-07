<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('nome','admin')->first();
        $userRole = Role::where('nome','user')->first();

        $admin  = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        
        $user  = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user')
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
    
}
