<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thisUser = Auth::user();

        return view('profile.index', array('user' => $thisUser));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $thisUser = Auth::user();

        return view('profile.edit', array('user' => $thisUser));
    }

    protected function validator(array $data, bool $noEmail)
    {
        if ($noEmail){

            return Validator::make($data, [
                'password' => 'required|string|min:6|confirmed|max:255',
                'firstName' => 'nullable|string|min:2|max:255',
                'lastName' => 'nullable|string|min:2|max:255',
                'plz' => 'nullable|string|min:2|max:20',
                'city' => 'nullable|string|min:2|max:255',
                'address' => 'nullable|string|min:6|max:255',
            ]);
        }
        else {

            return Validator::make($data, [
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed|max:255',
                'firstName' => 'nullable|string|min:2|max:255',
                'lastName' => 'nullable|string|min:2|max:255',
                'plz' => 'nullable|string|min:2|max:20',
                'city' => 'nullable|string|min:2|max:255',
                'address' => 'nullable|string|min:6|max:255',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userID = Auth::id();

        $newEmail = $request->input('email');
        $newPW = encrypt($request->input('password'));
        $newFirstName = $request->input('firstName');
        $newLastName = $request->input('lastName');
        $newAddress = $request->input('address');
        $newCity = $request->input('city');
        $newPLZ = $request->input('plz');

        $oldEmail = DB::table('users')->where([
            ['id', '=', $userID],
        ])->value('email');


        if ($newEmail == $oldEmail) {
            $this->validator($request->all(), true)->validate();
        }
        else {
            $this->validator($request->all(), false)->validate();
        }

        DB::table('users')->where([
            ['id', '=', $userID],
        ])->update([
            'email' => $newEmail,
            'password' => $newPW,
            'firstName' => $newFirstName,
            'lastName' => $newLastName,
            'address' => $newAddress,
            'plz' => $newPLZ,
            'city' => $newCity,
        ]);

        return redirect()->action('ProfileController@index');
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
