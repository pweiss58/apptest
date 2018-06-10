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
        factory(App\Location::class, 2)->create()->each(function($u){
            $u->users()->save(factory(App\User::class)->make());
        });

        factory(App\Location::class, 2)->create()->each(function($u){
            $u->events()->save(factory(App\Event::class)->make());
        });
    }
}
