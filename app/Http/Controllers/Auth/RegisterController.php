<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;




class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|min:6|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed|max:255',
            'firstName' => 'nullable|string|min:2|max:255',
            'lastName' => 'nullable|string|min:2|max:255',
            'plz' => 'nullable|string|min:2|max:20',
            'city' => 'nullable|string|min:2|max:255',
            'address' => 'nullable|string|min:6|max:255',
            'agbCheck' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $randomInt = 0;
        while ($randomInt == 0 || (DB::table('users')->where('customer_id','=',$randomInt)->first() != null)) {
            $randomInt = random_int(000300000,999999999);
        }


        $user =  User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'plz' => $data['plz'],
            'city' => $data['city'],
            'address' => $data['address'],
            'customer_id' => $randomInt,
            'type' => User::DEFAULT_TYPE,
            'token' => str_random(24)
        ]);


        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

    protected function guard(){
        return Auth::guard('web');

    }

    public function verifyUser($token)
    {
        $verifyUser = DB::table('users')->where('token',$token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/login')->with('status', $status);
    }


    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'We sent you an account activation link. Check your email and click on the link to verify it.');
    }
}
