<?php

use Illuminate\Database\Seeder;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($departmentID = 1; $departmentID <= (\App\Department::all()->count()); $departmentID++){

            for ($i = 1; $i <= (\App\Department::all()->where('id', '=', $departmentID )->first()->rowCount); $i++) {

                for ($j = 1; $j <= (\App\Department::all()->where('id', '=', $departmentID )->first()->columnCount); $j++) {

                    DB::table('seats')->insert(array(
                        'seatX' => $i,
                        'seatY' => $j,
                        'department_id' => $departmentID,
                    ));
                }
            }
        }
    }
}
