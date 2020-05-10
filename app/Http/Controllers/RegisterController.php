<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    		'name'         => 'required|min:3|string',
            'email'        => 'required|string|email|unique:users',
            'password'     => 'required|min:6|',
            'phone_number' => 'required|',
            'role'         => 'required',

    	]);


    	$data = [
    		'name'         => $request->name,
    		'email'        => $request->email,
    		'password'     => Hash::make($request["password"]),
    		'phone_number' => $request->phone_number,
    		'role'         => $request->role,
    	];

        $result = User::create($data);

        dd($result);
         

    	if ($data['role'] == 'Talent') {
            echo "<h1> Wellcome " .$data['name']." Kamu sedang Berada Di Halaman " .$data['role']. "</h1>";
        }else if ($data['role'] == 'Client') {
            echo "<h1> Wellcome " .$data['name']." Kamu sedang Berada Di Halaman " .$data['role']. "</h1>";
        }else if($data['role'] == 'Cowork'){
            echo "<h1> Wellcome " .$data['name']." Kamu sedang Berada Di Halaman " .$data['role']. "</h1>";
        }
    }
}
