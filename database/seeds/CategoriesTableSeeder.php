<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\Category::class, 2)->create()->each(function($u){
            $u->eventsets()->save(factory(App\Eventset::class)->make());
            $u->eventsets()->save(factory(App\Eventset::class)->make());
        });*/

        factory(App\Category::class, 2)->create();
    }
}
