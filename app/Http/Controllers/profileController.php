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
}
