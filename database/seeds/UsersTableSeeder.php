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
        /*DB::table('users')->insert([
            'username' => str_random(10),
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            //'pw' => 'apptest',
            'pw' =>bcrypt('apptest'),
            'location_id' => '1',
        ]);*/

        factory(App\User::class, 2)->create()->each(function($u){
            $u->tickets()->save(factory(App\Ticket::class)->make());
        });
    }
}
