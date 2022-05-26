<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use Validator;
use App\Models\Talent;
use App\Models\User;

class RegisterController extends Controller
{
    public function apiRegisterTalent(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'        => 'required|string|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
        ]); 

        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        //PROSES INSERT DATABASE talent
        $user = User::where('email',$request->email)->get();

        $data = [
            'username' => 'user'.uniqid().explode('@', $request->email)[0],
            'email'=> $request->email, 
            'password' => Hash::make($request->password),
        ];

        if ($user->count() == 0){
            $user = User::create($data); 
        } else {
            return response()->json([
                'errors' => [
                    'email' => ["The email has already been taken."]
                ],
            ]);
        }

        return response()->json(['user' => $user]);
    }
}
