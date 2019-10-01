<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\Role::create(['name' => 'admin', 'description' => 'admin Role']);
        \App\Role::create(['name' => 'editor', 'description' => 'editor Role']);
        \App\Role::create(['name' => 'user', 'description' => 'user Role']);

        $adminUser = \App\User::create([
        	'name' => 'Admin',
        	'email' => 'admin@admin.com',
        	'email_verified_at' => date('Y-m-d H:i:s'),
        	'password' => bcrypt('123456')
        ]);
		$adminUser->roles()->attach(\App\Role::where('name','admin')->first());
    }
}
