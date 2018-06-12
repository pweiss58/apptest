<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($departmentID = 1; $departmentID <= (\App\Department::all()->count());$departmentID++){

            for ($i = 1; $i <= (\App\Department::all()->where('id', T_IS_EQUAL, $departmentID )->first()->rowCount); $i++) {

                for ($j = 1; $j <= (\App\Department::all()->where('id', T_IS_EQUAL, $departmentID )->first()->columnCount); $j++) {

                    DB::table('tickets')->insert([
                        'priceCategory' => random_int(1,10),
                        'description' => str_random(30),
                        'x' => $i,
                        'y' => $j,
                        'available' => true,
                        'department_id' => $departmentID,
                        'event_id' => random_int(1,8),
                    ]);
                }
            }
        }
    }
}
