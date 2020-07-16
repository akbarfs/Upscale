<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Builder;

class MasterDataUserController extends Controller
{
   

    public function index()
    {
       $users = DB::table('users')->get();
    	return view('admin.user',['users' => $users]);
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

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        DB::table('users')->insert([
		'name' => $request->nama,
		'email' => $request->email,
		'password' => $request->password,
		'username' => $request->username,
		'level' => isset($request->level)?$request->level:"undefined",]);


		return redirect('/admin/masterdata/user');

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
       $UserEdit = DB::table('users')->where('id',$id)->first();
        return response()->json($UserEdit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$validation = $request->validate([
            'namaEdit'=>'required|string|max:150',
            'emailEdit'=>'required|string|email|max:100|unique:users',
            'passwordEdit'=>'max:150|required|required_with:confirmpass|same:confirmpass',
            'confirmpassEdit'=>'max:150',
            'usernameEdit'=>'required|string|unique:users,username|max:150',

        ]);

        $request->user()->fill([
            'passwordEdit' => Hash::make($request->password)
        ])->save();

        DB::table('users')->where('id',$request->id)->update([
		'name' => $request->namaEdit,
		'email' => $request->emailEdit,
		'password' => $request->passwordEdit,
		'username' => $request->usernameEdit,
		'level' => isset($request->levelEdit)?$request->level:"undefined",
	]);


		return redirect('/admin/masterdata/user');
        
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
		return redirect('/admin/masterdata/user');
    }

    
}



