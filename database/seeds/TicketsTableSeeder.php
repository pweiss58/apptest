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
        for ($eventID = 1; $eventID <= (\App\Event::all()->count()); $eventID++) {

            $thisEvent = DB::table('events')->where('id', '=', $eventID)->first();
            $thisLocation = DB::table('locations')->where('id', '=', $thisEvent->location_id)->first();

            for ($departmentNr = 1; $departmentNr <= $thisLocation->departmentCount; $departmentNr++) {

                $thisDepartment = DB::table('departments')->where([
                    ['location_id', '=', $thisLocation->id],
                    ['departmentNr', '=', $departmentNr],
                ])->first();

                for ($i = 1; $i <= $thisDepartment->rowCount; $i++) {

                    for ($j = 1; $j <= $thisDepartment->columnCount; $j++) {

                        $thisSeat = DB::table('seats')->where([
                            ['department_id', '=', $thisDepartment->id],
                            ['seatX', '=', $i],
                            ['seatY', '=', $j],
                        ])->first();

                        //$int= rand(1162055681,1262055681);

                        if($j == 1){
                            DB::table('tickets')->insert(array(
                                'priceCategory' => random_int(1, 10),
                                'description' => str_random(30),
                                'available' => false,
                                'paid' => false,
                                //'paymentDate' => date("Y-m-d H:i:s",$int),
                                'event_id' => $eventID,
                                'seat_id' => $thisSeat->id,
                                //'user_id' => random_int(1, (\App\User::all()->count())),
                            ));
                        }

                        else {
                            DB::table('tickets')->insert(array(
                                'priceCategory' => random_int(1, 10),
                                'description' => str_random(30),
                                'available' => true,
                                'paid' => false,
                                //'paymentDate' => date("Y-m-d H:i:s",$int),
                                'event_id' => $eventID,
                                'seat_id' => $thisSeat->id,
                                //'user_id' => random_int(1, (\App\User::all()->count())),
                            ));
                        }
                    }
                }
            }
        }
    }
}
