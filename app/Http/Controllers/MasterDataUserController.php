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
		'nama' => $request->nama,
		'email' => $request->email,
		'password' => $request->password,
		'username' => $request->username]);


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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    
}

