<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatsTableSeeder extends Seeder
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

                    DB::table('seats')->insert([
                        'x' => $i,
                        'y' => $j,
                        'occupied' => false,
                        'department_id' => $departmentID,
                    ]);
                }
            }
        }
    }
}
