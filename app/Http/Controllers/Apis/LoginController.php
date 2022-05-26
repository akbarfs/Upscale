<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Hash;

use App\Models\User;
use App\Models\Talent;

class LoginController extends Controller
{
    public function apiLogin() {
        $validator = Validator::make(request()->all(), [
            'identifier' => ['required'],
            'password' => ['required'],
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $credentials = request()->only(['identifier', 'password']);
        $user = User::whereEmail($credentials['identifier'])->orWhere('username', $credentials)->first();

        if($user) {
            if(Hash::check($credentials['password'], $user->password)) {
                $uniqToken = md5($user->email.uniqid().mt_rand(9999,9999).\Carbon\Carbon::now()->timestamp);
                $user->access_token = $uniqToken;
                $user->save();
                
                return response()->json(['access_token' => $uniqToken, 'user' => $user]);
            }

            return response()->json(['errors' => [
                'credentials' => ['Username / Password salah. (2)']
            ]]);
        }

        return response()->json(['errors' => [
            'credentials' => ['Username / Password salah.']
        ]]);
    }
}
