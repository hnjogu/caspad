<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

             // createpermissions permissions
        $this->middleware('permission:home-dashboard', ['only' => ['index']]);

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // total users
        $Total_users = User::all();
        $Today_new_users = User::whereDate('created_at', Carbon::today())->get();
        //role count 
        $users_count = User::with(['roles' => function($q){
            $q->where('name', 'admin');
            }])->get();
        //role loop dashboard
        $role = Auth::user()->roles->pluck('name');

            
        return view('home',compact('Total_users','Today_new_users'))
        ->with('role',$role)
        ->with('users_count',$users_count);
    }

    public function approval()
    {
        return view('newuser.approval');
    }

}
