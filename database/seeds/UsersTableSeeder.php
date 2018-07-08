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
        factory(\App\User::class, 5)->create();

        //Admin Login
        DB::table('users')->insert(array(
            'username' => 'srill',
            'email' => 'sven.rill@hof-university.de',
            'password' => bcrypt('apptest'),
            'type' => 'admin',
            'customer_id' => 123456789,
            'firstName' => 'Sven',
            'lastName' => 'Rill',

        ));
    }
}
