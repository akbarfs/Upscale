<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    // protected $redirectTo ='/home';s

    public function processLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        // $level = DB::table('users')->where('username', '=' ,$username)->pluck('level');
        // $level = $level[0];

        // $data = DB::table('users')->where('username',$username)->first();

        // if ($data != NULL) {
            
        // }else{
        //     return redirect()->back()->withErrors(['Username or password is invalid']);            
        // }


        if($data!=NULL){
            if($data->level == 'admin'){
                if(Hash::check($password, $data->password)){
                    Session::put('username',$data->username);
                    Session::put('level',$data->level);
                    Session::put('login',TRUE);
                    return redirect()->route('dashboard');
                }else{
                    return redirect()->back()->withErrors(['Username or password is invalid']);
                }
            }else{
                
                if ($data->level == 'talent') {
                    if (Hash::check($password, $data->password)) {
                        dd('talent');
                    }else{
                        dd('password invalid');
                }

                }else if ($data->level == 'client') {
                    if (Hash::check($password, $data->password)) {
                        dd('client'); 
                    }else{
                        dd('password invalid');
                }

                }else if ($data->level == 'cowork') {
                    if (Hash::check($password, $data->password)) {
                        dd('cowork');    
                    }else{
                        dd('password invalid');
                }else{
                    dd('password or username invalid');
                }
            }


            }
        }else{
            return redirect()->back()->withErrors(['Username or password is invalid']);
        }
        // if (Auth::attempt(['username'=> $username,'password'=> $password,]))
        // {
        //     $level = DB::table('users')->where('username', '=' ,$username)->pluck('level');
        //     $level = $level[0];
        //     session(['level' => $level]);
        //     // echo "<script>alert('".session('level')."')</script>";
        //     if($level == 'admin'){
        //         return redirect('admin/dashboard');
        //     }
        //     else{
        //         return redirect('user/dashboard');
        //     }
        //     // Authentication passed....
        //     //return redirect()->intended('dashboard');
        //     //return 'succes';
        // }
        //  else
        // {
        //     return redirect()->back()->withErrors(['Username or password is invalid']);
        // }
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }

}
