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

        factory(App\User::class, 16)->create()->each(function($u){
            $u->location()->associate(App\Location::find(random_int(1,16)))->save();
        });
    }
}
