<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($eventsetID = 1; $eventsetID <= (\App\Eventset::all()->count()); $eventsetID++){

            for ($i = 1; $i <= (\App\Eventset::all()->where('id', T_IS_EQUAL, $eventsetID )->first()->eventCount); $i++){

                $dateInt= rand(1162055681,1262055681);
                $priceFloat = (rand(4100, 6900) / 100);

                DB::table('events')->insert(array(
                    'startDate' => date("Y-m-d H:i:s", $dateInt),
                    'endDate' => date("Y-m-d H:i:s",$dateInt+1),
                    'eventNr' => $i,
                    'eventset_id' => $eventsetID,
                    'location_id' => random_int(1, (\App\Location::all()->count())),
                    'basePrice' => $priceFloat,
                ));
            }
        }
    }
}
