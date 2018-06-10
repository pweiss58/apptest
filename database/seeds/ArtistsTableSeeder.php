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
        factory(App\Artist::class, 2)->create()->each(function($u){
            $u->events()->save(factory(App\Event::class)->make());
        });
    }
}
