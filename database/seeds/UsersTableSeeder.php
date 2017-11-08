<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('db')->table('users')->insert([
        	'name' => 'admin',
        	'email' => 'admin@local.com',
        	'password' => app('hash')->make('admin'),
        ]);
    }
}
