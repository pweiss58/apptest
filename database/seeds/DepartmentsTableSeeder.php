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
        /*factory(App\Department::class, 16)->create()->each(function($u){
            $u->location()->associate(App\Location::find(random_int(1,16)))->save();
        });*/

        $availableDescriptions = array("Sitzplatz", "Stehplatz");

        for ($locationID = 1; $locationID <= (\App\Location::all()->count()); $locationID++){

            for ($i = 1; $i <= (\App\Location::all()->where('id', T_IS_EQUAL, $locationID )->first()->departmentCount); $i++){

                DB::table('departments')->insert(array(
                    'rowCount' => random_int(5, 15),
                    'columnCount' => random_int(5, 10),
                    'departmentNr' => $i,
                    'description' => $availableDescriptions[array_rand($availableDescriptions, 1)],
                    'location_id' => $locationID,
                ));
            }
        }
    }
}
