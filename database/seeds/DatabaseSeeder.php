<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            EventSetsTableSeeder::class,
            LocationsTableSeeder::class,
            EventsTableSeeder::class,
            DepartmentsTableSeeder::class,
            UsersTableSeeder::class,
            ArtistsTableSeeder::class,
            CommentsTableSeeder::class,
            TicketsTableSeeder::class,
        ]);

    }
}
