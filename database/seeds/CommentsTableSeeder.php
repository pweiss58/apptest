<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, 8)->create()->each(function($u){
            $u->eventset()->associate(App\Eventset::find(random_int(1,4)))->save();
        });
    }
}
