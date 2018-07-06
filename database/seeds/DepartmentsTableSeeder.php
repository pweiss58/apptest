<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $availableDescriptions = array("Sitzplatz", "Stehplatz");

        for ($locationID = 1; $locationID <= (\App\Location::all()->count()); $locationID++){

            for ($i = 1; $i <= (\App\Location::all()->where('id', T_IS_EQUAL, $locationID )->first()->departmentCount); $i++){

                $departmentPrice = (rand(500, 3000) / 100);

                DB::table('departments')->insert(array(
                    'rowCount' => random_int(5, 10),
                    'columnCount' => random_int(7, 10),
                    'departmentNr' => $i,
                    'description' => $availableDescriptions[array_rand($availableDescriptions, 1)],
                    'departmentPrice' => $departmentPrice,
                    'location_id' => $locationID,
                ));
            }
        }
    }
}
