<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
		$role_user = Role::where('name', 'user')->first();

		$admin = new User();
		$admin->name = 'admin';
		$admin->email = 'rogermasf@gmail.com';
		$admin->password = bcrypt('admin');
		$admin->save();
		$admin->roles()->attach($role_admin);

		$user = new User();
		$user->name = 'test';
		$user->email = 'test@test.com';
		$user->password = bcrypt('test');
		$user->save();
		$user->roles()->attach($role_user);
    }
}
