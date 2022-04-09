<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Gallery_User;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stats()
    {
        $encodeCount = Gallery::
        selectRaw("SUM(CASE WHEN public = 0  THEN 1 ELSE 0 END) as private_count")
        ->selectRaw("SUM(CASE WHEN public = 1  THEN 1 ELSE 0 END) as public_count")
        ->first();
        $savedCount = Gallery_User::count();
        $usersCount = User::
        selectRaw("SUM(CASE WHEN is_admin = 0  THEN 1 ELSE 0 END) as user_count")
        ->selectRaw("SUM(CASE WHEN is_admin = 1  THEN 1 ELSE 0 END) as admin_count")
        ->first();
         $galleries = Gallery::all();

        
        return view('admin.dashboard',compact('encodeCount','savedCount','usersCount','galleries'));
        
    }
    public function destroy($id){
        $gallery = Gallery::where('id',$id)->firstOrFail(); 

        if($gallery->delete()){
            return redirect()->route('dashboard');
        }

    }
}
