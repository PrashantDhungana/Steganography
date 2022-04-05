<?php

namespace App\Http\Controllers;

use App\Http\Traits\EncodeDecodeTrait;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;


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
        $gallery = Gallery::where('user_id',auth()->user()->id)->where('public',0)->get();
        $favourite = User::where('id',auth()->user()->id)->get();
        $favourites = $favourite[0]->gallery()->get();
        $user = User::where('id' , auth()->user()->id)->first();

        return view('user.index' ,compact('posts' ,'favourites','gallery','user'));
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
    public function edit()
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
    //    dd($request->all());
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
            // dd($user);
        $user->avatar = $imageName;
        $user->email = $request->email;
        $user->name = $request->name;
       
        if($user->save())
            return redirect()->route('user.index');

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
        
        $request->validate([
            'currentimage' =>['required','image'],
            'newimage' => ['required','image']
        ]);
        $loggedUser = auth()->user();
        // dd($this->desteganize($request->currentimage));
       if( $loggedUser->password != $this->desteganize($request->currentimage)){
           throw ValidationException::withMessages(['change_error' =>["Invalid Image"]]);
       }
       else{
            $newpass = Crypt::encryptString(Str::random(16));
            $result = $this->steganize($request->newimage, $newpass,true,"users/");

            $loggedUser = User::find($loggedUser->id);
            $loggedUser->password = $newpass;
            $loggedUser->filename = $result[0];
            if($loggedUser->save())
                return redirect('/user')->with('success','Password Changed Successfully');


       }

    }

    public function generateToken()
    {
        $user = auth()->user();
        $token = $user->createToken('myapptoken')->plainTextToken;

        return ['message' => 'Do not share this token with anyone','Bearer_Token'=>$token];
    }

    public function delToken()
    {
        $user = auth()->user();
        $user->tokens()->delete();
    }
}
