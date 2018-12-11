<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('nome', 'user')->first();
      $role_admin  = Role::where('nome', 'admin')->first();

      $user = new User();
      $user->name = 'Nome';
      $user->email = 'employee@example.com';
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);

      $admin = new User();
      $admin->name = 'Manager Name';
      $admin->email = 'manager@example.com';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);
    }
}
