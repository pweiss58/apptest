<?php

use Illuminate\Database\Seeder;

class EventSetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\Eventset::class, 2)->create()->each(function($u){
            $u->events()->save(factory(App\Event::class)->make());
        });

        factory(App\Eventset::class, 2)->create()->each(function($u){
            $u->comments()->save(factory(App\Comment::class)->make());
        });*/

        factory(App\Eventset::class, 4)->create()->each(function($u){
            $u->category()->associate(App\Category::find(random_int(1,\App\Category::all()->count())))->save();
        });


    }
}
