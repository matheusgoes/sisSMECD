<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = new Role();
      $role_user->nome = 'user';
      $role_user->descricao = 'A simple User';
      $role_user->save();

      $role_admin = new Role();
      $role_admin->nome = 'admin';
      $role_admin->descricao = 'Um usuario administrador';
      $role_admin->save();
    }
}
