<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\Location::class, 5)->create()->each(function($u){
            $u->departments()->save(factory(App\Department::class)->make());
            $u->events()->save(factory(App\Event::class)->make());
            $u->users()->save(factory(App\User::class)->make());
        });*/

        factory(App\Location::class, 4)->create();
    }
}
