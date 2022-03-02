<?php

namespace App\Http\Controllers;

use App\Http\Traits\EncodeDecodeTrait;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    use EncodeDecodeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Gallery::where('user_id',auth()->user()->id)->get(); 
        return view('user.index' ,compact('posts'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->firstorFail();
        if($user->delete()){
            return  redirect()->route('user.index')->with("message", "User Deleted Successfully");

        }
    }
    public function updatePassword(Request $request){
        // dd("hello");
        $request->validate([
            'currentimage' =>['required','image'],
            'password' => ['required'],
            'newimage' => ['required','image']
        ]);
        $loggedUser = auth()->user();
        // dd($this->desteganize($request->currentimage));
       if( $loggedUser->password != $this->desteganize($request->currentimage)){
           abort(404);
       }
       else{
            $newpass = Crypt::encryptString($request->password);
            $result = $this->steganize($request->newimage, $newpass,true);

            $loggedUser = User::find($loggedUser->id);
            $loggedUser->password = $newpass;
            $loggedUser->filename = $result[0];
            if($loggedUser->save())
                return redirect('/user');


       }

    }
}
