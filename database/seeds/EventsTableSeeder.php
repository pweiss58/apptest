<?php

use App\Event;
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


                $event = new Event();

                $event->startDate = date("Y-m-d H:i:s", $dateInt);
                $event->endDate = date("Y-m-d H:i:s", $dateInt+1);
                $event->eventNr = $i;
                $event->eventset_id = $eventsetID;
                $event->location_id = random_int(1, (\App\Location::all()->count()));
                $event->basePrice = $priceFloat;

                $event->save();

                $event->artist()->attach(App\Artist::find($eventsetID));
            }
        }
    }
}
