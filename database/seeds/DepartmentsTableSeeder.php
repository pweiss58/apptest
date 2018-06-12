<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Department::class, 16)->create()->each(function($u){
            $u->location()->associate(App\Location::find(random_int(1,16)))->save();
        });
    }
}
