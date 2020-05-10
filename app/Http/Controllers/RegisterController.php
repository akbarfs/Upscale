<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers; 

    public function index(){
        return view('auth.register');
    }

    public function doRegister(Request $request){

    	$this->validate ($request,[
            'name'         => 'required|min:3|max:25|string',
    		'username'     => 'required|min:3|max:20|string|unique:users,username',
            'email'        => 'required|string|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'phone_number' => 'required|max:15|phone_number|digits_between:5,15',
            'role'         => 'required',
    	]);

        if ( !in_array($request->role,array('talent','client','cowork')) ) {die("unauthorize");}

    	$data = [
    		'name'         => $request->name,
            'username'        => $request->username,
    		'email'        => $request->email,
    		'password'     => Hash::make($request["password"]),
    		'phone_number' => $request->phone_number,
    		'role'         => $request->role
    	];

        $result = User::create($data);

        return response()->json(array("message"=>"success","status"=>1));
    }
}
