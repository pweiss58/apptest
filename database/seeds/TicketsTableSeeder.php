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

                    $int= rand(1162055681,1262055681);

                    DB::table('tickets')->insert(array(
                        'priceCategory' => random_int(1,10),
                        'description' => str_random(30),
                        'seatX' => $i,
                        'seatY' => $j,
                        'available' => true,
                        'paid' => ((random_int(1,2) == 2)  ? true : false),
                        'paymentDate' => date("Y-m-d H:i:s",$int),
                        'department_id' => $departmentID,
                        //'event_id' => random_int(1,8),
                        'user_id' => random_int(1, (\App\User::all()->count())),
                    ));
                }
            }
        }
    }
}
