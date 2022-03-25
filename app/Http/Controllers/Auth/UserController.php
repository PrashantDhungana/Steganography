<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
      return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("admin.user.edit", compact('user'));
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
        // dd($request->all());
        $request->validate([
            'avatar'=>['nullable','image'],
            
            'email'=>['required'],
            
             
            'name'=>['required']
        ]);
        $profileImg = $request->file('avatar');
        if($profileImg){
            
            $extension = $profileImg->getClientOriginalExtension();
            $imageName = uniqid('img_').'.'.$extension;
            $profileImg->move('storage/profile/',$imageName);
        }
        else
            $imageName = 'user.png';

            
            $user = User::find($id);
            
        $user->avatar = $imageName;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->is_admin = $request->role;
       
        if($user->save())
            return redirect()->route('admin.index');

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::where('id', $id)->firstOrFail(); 
       
        if( $user->delete() ){
            return redirect()->route('admin.index')->with("message" , "Users deleted Sucessfully");
        }
    }
}
