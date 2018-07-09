<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Eventset;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $eventsets = DB::table('eventsets')->get();
        $events = DB::table('events')->get();
        $categories = DB::table('categories')->get();
        $locations = DB::table('locations')->get();

        return view('admin.control', array('eventsets' => $eventsets, 'events' => $events, 'categories' => $categories, 'locations' => $locations));
    }

    public function updateEventsets(Request $request)
    {

        if (isset($_POST['updateEventsets'])) {

            $eventsets = DB::table('eventsets')->get();
            $events = DB::table('events')->get();

            foreach ($eventsets as $eventset) {

                $request->validate([
                    'name' . strval($eventset->id) => 'required|string|min:3|max:255',
                    'shortDescription' . strval($eventset->id) => 'required|string|min:10',
                    'longDescription' . strval($eventset->id) => 'required|string|min:10',
                ]);

                $newName = $request->input('name' . strval($eventset->id));
                $newShortDescription = $request->input('shortDescription' . strval($eventset->id));
                $newLongDescription = $request->input('longDescription' . strval($eventset->id));


                DB::table('eventsets')->where([
                    ['id', '=', $eventset->id],
                ])->update([

                    'name' => $newName,
                    'shortDescription' => $newShortDescription,
                    'longDescription' => $newLongDescription,
                ]);
            }

            return back();

        } else {

            return $this->deleteEventset($request);
        }

    }

    public function deleteEventset(Request $request)
    {

        $eventsets = DB::table('eventsets')->get();

        foreach ($eventsets as $eventset) {

            $deleteString = "deleteEventset" . strval($eventset->id);

            if (isset($_POST[$deleteString])) {

                DB::table('eventsets')->where([
                    ['id', '=', $eventset->id],
                ])->delete();

                return back();

            }

        }

        return $this->deleteEvent($request);
        
    }


    public function addEventset(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'shortDescription' => 'required|string|min:10',
            'longDescription' => 'required|string|min:10',
            'teaserImage' => 'required|image',
            'bannerImage' => 'required|image',
            'eventCount' => 'required|integer',
        ]);

        $name = $request->input('name');
        $shortDescription = $request->input('shortDescription');
        $longDescription = $request->input('longDescription');
        $categoryName = $request->input('category');
        $teaserImage = $request->file('teaserImage');
        $bannerImage = $request->file('bannerImage');
        $eventCount = $request->input('eventCount');

        $input['teaserImage'] = $name . '.' . $teaserImage->getClientOriginalExtension();
        $input['bannerImage'] = $name . '_gross' . '.' . $bannerImage->getClientOriginalExtension();

        $destinationPath = public_path('/img');

        $teaserImage->move($destinationPath, $input['teaserImage']);
        $bannerImage->move($destinationPath, $input['bannerImage']);

        $categoryID = DB::table('categories')->where([
            ['name', '=', $categoryName],
        ])->value('id');

        /*DB::table('eventsets')->insert([
            ['name' => $name, 'shortDescription' => $shortDescription, 'longDescription' => $longDescription, 'teaserImage' => $input['teaserImage'], 'bannerImage' => $input['bannerImage'], 'category_id' => $categoryID, 'eventCount' => $eventCount]
        ]);

        $justCreatedEventsetID = DB::getPdo()->lastInsertId();*/

        $eventset = new Eventset();

        $eventset->name = $name;
        $eventset->shortDescription = $shortDescription;
        $eventset->longDescription = $longDescription;
        $eventset->teaserImage = $input['teaserImage'];
        $eventset->bannerImage = $input['bannerImage'];
        $eventset->category_id = $categoryID;
        $eventset->eventCount = $eventCount;

        $eventset->save();

        $justCreatedEventsetID = $eventset->id;

        for ($i = 1; $i <= $eventCount; $i++) {

            $dateInt = rand(1162055681, 1262055681);
            $priceFloat = (rand(4100, 6900) / 100);

            $locationID = random_int(1, (\App\Location::all()->count()));

            DB::table('events')->insert(array(
                'startDate' => date("Y-m-d H:i:s", $dateInt),
                'endDate' => date("Y-m-d H:i:s", $dateInt + 1),
                'eventNr' => $i,
                'eventset_id' => $justCreatedEventsetID,
                'location_id' => $locationID,
                'basePrice' => $priceFloat,
            ));

            $justCreatedEventID = DB::getPdo()->lastInsertId();
            $thisEvent = DB::table('events')->where('id', '=', $justCreatedEventID)->first();
            $thisLocation = DB::table('locations')->where('id', '=', $locationID)->first();

            for ($departmentNr = 1; $departmentNr <= $thisLocation->departmentCount; $departmentNr++) {

                $thisDepartment = DB::table('departments')->where([
                    ['location_id', '=', $locationID],
                    ['departmentNr', '=', $departmentNr],
                ])->first();

                for ($j = 1; $j <= $thisDepartment->rowCount; $j++) {

                    for ($g = 1; $g <= $thisDepartment->columnCount; $g++) {

                        $thisSeat = DB::table('seats')->where([
                            ['department_id', '=', $thisDepartment->id],
                            ['seatX', '=', $j],
                            ['seatY', '=', $g],
                        ])->first();

                        DB::table('tickets')->insert(array(
                            'price' => $thisEvent->basePrice + $thisDepartment->departmentPrice,
                            'description' => str_random(30),
                            'available' => true,
                            'paid' => false,
                            'event_id' => $justCreatedEventID,
                            'seat_id' => $thisSeat->id,
                        ));
                    }
                }
            }
        }

        return back();
    }

    public function addEvent(Request $request)
    {

        $request->validate([
            'startDate' => 'required|date_format:"Y-m-d H:i:s"',
            'endDate' => 'required|date_format:"Y-m-d H:i:s"',
            'basePrice' => 'required|numeric',
        ]);

        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $basePrice = $request->input('basePrice');
        $eventset_id = $request->input('eventset_id');
        $location_id = $request->input('location_id');

        $eventCount = DB::table('eventsets')->where([
            ['id', '=', $eventset_id],
        ])->value('eventCount');

        $events = DB::table('events')->where([
            ['eventset_id', '=', $eventset_id],
        ])->get();

        $i = 1;
        $firstFreeEventNr = null;

        foreach ($events as $event) {

            if($event->eventNr != $i){

                $firstFreeEventNr = $i;
                break;
            }

            $i++;

        }

        if ($firstFreeEventNr == null){

            $firstFreeEventNr = $i;
        }

        $startDateDate = date_create_from_format('Y-m-d H:i:s', $startDate);
        $endDateDate = date_create_from_format('Y-m-d H:i:s', $endDate);


        DB::table('events')->insert(array(
            'startDate' => $startDateDate,
            'endDate' => $endDateDate,
            'eventNr' => $firstFreeEventNr,
            'eventset_id' => $eventset_id,
            'location_id' => $location_id,
            'basePrice' => $basePrice,
        ));

        $justCreatedEventID = DB::getPdo()->lastInsertId();
        $thisEvent = DB::table('events')->where('id', '=', $justCreatedEventID)->first();
        $thisLocation = DB::table('locations')->where('id', '=', $location_id)->first();

        for ($departmentNr = 1; $departmentNr <= $thisLocation->departmentCount; $departmentNr++) {

            $thisDepartment = DB::table('departments')->where([
                ['location_id', '=', $location_id],
                ['departmentNr', '=', $departmentNr],
            ])->first();

            for ($j = 1; $j <= $thisDepartment->rowCount; $j++) {

                for ($g = 1; $g <= $thisDepartment->columnCount; $g++) {

                    $thisSeat = DB::table('seats')->where([
                        ['department_id', '=', $thisDepartment->id],
                        ['seatX', '=', $j],
                        ['seatY', '=', $g],
                    ])->first();

                    DB::table('tickets')->insert(array(
                        'price' => $thisEvent->basePrice + $thisDepartment->departmentPrice,
                        'description' => str_random(30),
                        'available' => true,
                        'paid' => false,
                        'event_id' => $justCreatedEventID,
                        'seat_id' => $thisSeat->id,
                    ));
                }
            }
        }

        return back();

    }

    public function deleteEvent(Request $request){

        $eventsets = DB::table('eventsets')->get();

        foreach ($eventsets as $eventset) {

            if (isset($_POST[strval($eventset->id)])) {

                $eventset_id = $eventset->id;
                $eventNr = $request->input('eventNr'.$eventset->id);
            }

        }
        
        DB::table('events')->where([
            ['eventset_id', '=', $eventset_id],
            ['eventNr', '=', $eventNr],
        ])->delete();

        return back();

    }
}
