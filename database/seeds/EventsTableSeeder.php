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
        /*factory(App\Event::class, 8)->create()->each(function($u){
            $u->eventset()->associate(App\Eventset::find(random_int(1,4)))->save();
            $u->location()->associate(App\Location::find(random_int(1,16)))->save();
        });*/

        for ($eventsetID = 1; $eventsetID <= (\App\Eventset::all()->count()); $eventsetID++){

            for ($i = 1; $i <= (\App\Eventset::all()->where('id', T_IS_EQUAL, $eventsetID )->first()->eventCount); $i++){

                $int= rand(1162055681,1262055681);

                DB::table('events')->insert(array(
                    'startDate' => date("Y-m-d H:i:s", $int),
                    'endDate' => date("Y-m-d H:i:s",$int+1),
                    /*'countAvailable' => random_int(0, 26),
                    'countReserved' => random_int(5, 26),*/
                    'eventNr' => $i,
                    'eventset_id' => $eventsetID,
                    'location_id' => random_int(1, (\App\Location::all()->count())),
                ));
            }
        }
    }
}
