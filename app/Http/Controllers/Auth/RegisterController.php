<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\country;
use DB;
use App\Mail\welcomemail;
use App\Mail\newuser;
use Illuminate\Support\Facades\Mail;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => 'required',
            'capitalcity' => 'required',
            'company' => 'required',
            'type' => 'required',
            'mobile' => 'required|unique:users,mobile,|min:10|max:13',
            //'id_number' => 'required|unique:users,id_number',
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

        //return User::create([
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'country' => $data['country'],
            'capitalcity' => $data['capitalcity'],
            'company' => $data['company'],
            'mobile' => $data['mobile'],
            'type' => $data['type'],
            'password' => Hash::make($data['password']),
        ]);
        Mail::to($data['email'])->send(new welcomemail($user));
        Mail::to("harristars@gmail.com")->send(new newuser($user));

    //return view('approval');
    return $user;
    }

    public function showRegistrationForm()
    {
        $country_list = DB::table('country')
            ->groupBy('country')
            ->get();

        return view('auth.register')

        ->with('country_list', $country_list);
    }

}
