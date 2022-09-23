<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
        $data = DB::table('users')->where('username',$username)->first();
        if($data!=NULL){
            if($data->level == 'admin'){
                if(Hash::check($password, $data->password)){
                    Session::put("user_id",$data->id); 
                    Session::put('username',$data->username);
                    Session::put('level',$data->level);
                    Session::put('login',TRUE);
                    return redirect()->route('dashboard');
                }else{
                    return redirect()->back()->withErrors(['Username or password is invalid']);
                }
            }else{
                return redirect('user/dashboard');
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

    public function doLogin(Request $request)
    {
        $email      = $request->email;
        $password   = $request->password;
       
        $data = DB::table('users')->where('email',$email)->first();

        if($data!=NULL)
        {
            if ( Hash::check($password, $data->password) )
            {
                Session::put('user_id',$data->id);
                Session::put('username',$data->email);
                Session::put('email',$data->email);
                Session::put('level',$data->level);
                Session::put('login',TRUE);

                // if ($data->level =='talent')
                // {
                //     return redirect()->route('talent.dashboard');
                // }
                // else if ($data->level == 'client')
                // {
                //     return redirect()->route('client');
                // }
                // else if ($data->level == 'cowork')
                // {
                //     return redirect()->route('cowork');
                // }

                return response()->json(array("level"=>$data->level,"status"=>1));
            }
            else
            {
                return response()->json(array("message"=>"Login gagal, silahkan ulangi lagi","status"=>0));
            }

            // return redirect()->back()->withErrors(['Username or password is invalid']);
        }
        else
        {
            return response()->json(array("message"=>"Login gagal, silahkan ulangi lagi","status"=>0));
        }
    }

    public function loginPageCompany(){
        return view('company.login');
    }

    public function loginProcessCompany(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = DB::table('company')->where('company_username',$username)->first();
        if($data!=NULL){
            if($data->company_level == 'user'){
                if(Hash::check($password, $data->company_password)){
                    Session::put("user_id",$data->company_id); 
                    Session::put('username',$data->company_username);
                    Session::put('level',$data->company_level);
                    Session::put('login',TRUE);
                    return redirect()->route('company.dashboard');
                }else{
                    return redirect()->back()->withErrors(['Username or password is invalid']);
                }
            }else{
                return redirect('/');
            }
        }else{
            return redirect()->back()->withErrors(['Username or password is invalid']);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

}
