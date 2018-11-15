<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Address;
use App\General;
use App\User;

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
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobile' => 'required|string',
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
        $gnl = General::first();

        if(isset($data['refer']))
        {
            $refer = User::where('username', $data['refer'])->first();
            
            $refuser = $refer->id;
        }
        else
        {
            $refuser = "0";
        }

        $lastu = User::latest()->first();

        if (is_null($lastu)) 
        {
            $newid = 1;
        }
        else
        {
            $newid = $lastu->id+1;
        }

        $wallet['user_id'] =$newid;
        $wallet['label'] = 'Default';
        $wallet['address'] = $gnl->wprefix.str_random(32);
        $wallet['balance'] = '0';
        Address::create($wallet);
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'mobile' => $data['mobile'],
            'refer' => $refuser,
            'status' => 1,
            'balance' => '0',
            'tauth' => 0,
            'tfver' => 1,
            'emailv' =>  $gnl->emailver,
            'smsv' =>  $gnl->smsver,
        ]);
    }
}