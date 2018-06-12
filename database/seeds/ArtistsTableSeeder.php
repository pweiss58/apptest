<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\Artist::class, 2)->create()->each(function($u){
            $u->events()->save(factory(App\Event::class)->make());
        });*/

        factory(App\Artist::class, 16)->create()->each(function($u){
            $u->event()->attach(App\Event::find(random_int(1,8)));
        });


    }
}
