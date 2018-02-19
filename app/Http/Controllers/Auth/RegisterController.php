<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
			'firstName' => 'required|string|max:60',
			'lastName' => 'required|string|max:60',
			'address' => 'required|string|max:255',
			'town' => 'required|string|max:60',
			'zipcode' => 'required|numeric',
			'province' => 'required|string|max:60',
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'address' => $data['address'],
            'town' => $data['town'],
            'zipcode' => $data['zipcode'],
            'province' => $data['province'],
        ]);
		$user->roles()->attach(Role::where('name', 'user')->first());
		return $user;
    }

//	/**
//	 * Esborrar per a permetre registres d'usuari
//	 */
//	public function showRegistrationForm()
//	{
//    	return redirect('login');
//	}
//
//	/**
//     * Esborrar per a permetre registres d'usuari
//     */
//	public function register()
//	{	}
}
