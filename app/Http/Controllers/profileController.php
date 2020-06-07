<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Spatie\Permission\Models\Role;

class profileController extends Controller
{
    //
    public function viewprofile($id)
    {
        $user = Auth::user();
        $user_id =DB::table('users')->where('id', $id)->get();
        return view('profile.view', compact('user'))
        ->with('user_id', $user_id);
    }

    public function geteditprofile(Request $request, $id)
    {
        $id =DB::table('users')->where('id', $id)->get();
        $country_list = DB::table('country')
            ->groupBy('country')
            ->get();
        return view('profile/edit')
        ->with('id', $id)
        ->with('country_list', $country_list);
    }

    public function updateprofile(Request $request, $id)
    {  
        $users = new users;

        $validatedData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'country' => 'required',
            'capitalcity' => 'required',
            'company' => 'required',
        ]);
        
     users::updateOrCreate(['id'=>$request->get('id')],
    ['id' => $request->get('id'),'name' => $request->get('name'),'lastname' => $request->get('lastname'),'guard_name' => $request->get('guard_name')]); 
    //dd($permissions); 


     return redirect('showpermissions')->with('message','permissions Updated successfully');
    }

}
