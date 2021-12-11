<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $attributes=$request->validate([
            'name'=> ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed','min:7','max:255'],
            'password_confirmation' => ['required_with:password|same:password|min:6'],
            'passimg' => ['required', 'image']
            
        ]);
        if($file = $request->hasFile('image')) {
             
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images' ;
            $file->move($destinationPath,$fileName);
            return redirect('/uploadfile');
    }

        dd('here');
        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
       
    }
    
}
