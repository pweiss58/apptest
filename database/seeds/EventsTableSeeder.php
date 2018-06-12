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
        factory(App\Event::class, 8)->create()->each(function($u){
            $u->eventset()->associate(App\Eventset::find(random_int(1,4)))->save();
        });
    }
}
