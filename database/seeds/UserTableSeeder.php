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
        $role_client = Role::where('name', 'client')->first();
        $role_admin  = Role::where('name', 'admin')->first();

        $client = new User();
        $client->name = 'Client Name';
        $client->email = 'client@example.com';
        $client->password = bcrypt('secret');
        $client->save();
        $client->roles()->attach($role_client);

        $client2 = new User();
        $client2->name = 'Second Client Name';
        $client2->email = 'second@example.com';
        $client2->password = bcrypt('secret');
        $client2->save();
        $client2->roles()->attach($role_client);

        $admin = new User();
        $admin->name = 'Admin Name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
