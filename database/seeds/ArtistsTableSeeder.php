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

        DB::table('artists')->insert(array(
            'name' => 'Kaleo',
            'genre' => 'Rock',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Patti Smith',
            'genre' => 'Rock',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Eric Clapton',
            'genre' => 'Rock',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Arctic Monkeys',
            'genre' => 'Rock',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Kaiser Chiefs',
            'genre' => 'Rock',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Tools',
            'genre' => 'Rock',

        ));

        DB::table('artists')->insert(array(
            'name' => 'ZAZ',
            'genre' => 'Pop',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Elton John',
            'genre' => 'Pop',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Matt Simons',
            'genre' => 'Pop',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Philipp Poisel',
            'genre' => 'Pop',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Beck',
            'genre' => 'Pop',

        ));

        DB::table('artists')->insert(array(
            'name' => 'George Ezra',
            'genre' => 'Pop',

        ));

        DB::table('artists')->insert(array(
            'name' => 'Max Richter',
            'genre' => 'Klassik',

        ));


    }
}
