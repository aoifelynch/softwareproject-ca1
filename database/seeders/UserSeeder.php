<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User;
        $admin->name = "Aoife Lynch";
        $admin->email = "aoifellynch@outlook.com";
        $admin->password = "password";
        $admin->save();

        // attach admin role to the user created above
        $admin->roles()->attach($role_admin);

        $user = new User;
        $user->name = "John Joe";
        $user->email = "johnjoe@email.com";
        $user->password = "password";
        $user->save();

        // attach admin role to the user created above
        $user->roles()->attach($role_user);
    }
}