<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $favourite = User::where('id',auth()->user()->id)->get();
     $favourites = $favourite[0]->gallery()->get();
    // dd($favourites);
    return view('user.index' ,compact('favourites'));

   
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
             request()->validate([
            'gall_id' => 'required',
            'user_id' => 'required'
        ]);
        $gallery = Gallery::find($request->gall_id);
        $gallery->user()->sync($request->user_id);
        return redirect()->route('user.index')->with('activetab','#v-pills-settings');
    }

   
}
