<?php

namespace App\Http\Controllers;

use App\Event;
use App\Eventset;
use Illuminate\Http\Request;
use App\Department;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function showDep($eventsetId, $eventNr, $departmentNr){

        //$eventset = Eventset::find($eventsetId);
        $eventLocationId = DB::table('events')->where([
            ['eventset_id', '=', $eventsetId],
            ['eventNr', '=', $eventNr],
        ])->value('location_id');
        $department = DB::table('departments')->where([
            ['location_id', '=', $eventLocationId],
            ['departmentNr', '=', $departmentNr],
        ])->first();

        return view('department.show', array('department' => $department));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
