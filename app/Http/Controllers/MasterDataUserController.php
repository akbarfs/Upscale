<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Builder;

class MasterDataUserController extends Controller
{
   

    public function index(Request $request)
    {
    		$users = DB::table('users')->select("*");

    		if ( $request->levelFilter != 'all' && isset($request->levelFilter)  )
            {
                $users = $users->where('level',$request->levelFilter); 
            }
            
            $users = $users->paginate(10);
            return view('admin.user',compact('users'));
            
    }

    

    public function create(Request $request)
    {
    	$validation = $request->validate([
            'nama'=>'required|string|max:150',
            'email'=>'required|string|email|max:100|unique:users',
            'password'=>'max:150|required|required_with:confirmpass|same:confirmpass',
            'confirmpass'=>'max:150',
            'username'=>'required|string|unique:users,username|max:150',

        ]);

        $hashedPassword = Hash::make($request->password);

        DB::table('users')->insert([
		'name' => $request->nama,
		'email' => $request->email,
		'password' => $hashedPassword,
		'username' => $request->username,
		'level' => isset($request->level)?$request->level:"undefined",]);


		return redirect('/admin/masterdata/user')->with('success', 'User Data succesfully created.');

    }

   

    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $users = DB::table('users')->where('id',$id)->get();
       return view('admin.userDetail',['users' => $users]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    	$validation = $request->validate([
            'name'=>'required|string|max:150',
            'email'=>'required|string|email|max:100',
            'password'=>'max:150|required_with:confirmpass|same:confirmpass',
            'confirmpass'=>'max:150',
            'username'=>'required|string|max:150',

        ]);

        $hashedPassword = Hash::make($request->password);

        DB::table('users')->where('id',$request->id)->update(array(
            'name' => $request->name,
			'email' => $request->email,
			'password' => $hashedPassword,
			'username' => $request->username,
			'level' => isset($request->level)?$request->level:"undefined",
	));



		return redirect()->back()->with('success', 'User Data succesfully edited.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('users')->where('id',$id)->delete();
		return redirect('/admin/masterdata/user')->with('success', 'User Data succesfully deleted.');
    }
}