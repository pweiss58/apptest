<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Event::class, 2)->create()->each(function($u){
            $u->tickets()->save(factory(App\Ticket::class)->make());
        });

        /*factory(App\Event::class, 2)->create()->each(function($u){
            $u->artists()->save(factory(App\Artist::class)->make());
        });*/
    }
}
