<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Project;
use Carbon\Carbon;
use DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

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
      ///admin dashboard
        // total Projects
        $Total_Projects = Project::all();
        // total users
        $Total_users = User::all();
        $Today_new_users = User::whereDate('created_at', Carbon::today())->get();
        // Freelancer
        //$Today_Freelancer = Project::where('freelancer_id'())->get();
        // User::whereHas('roles', function ($q) use ($roleName) {
        //     $q->where('name', $roleName);
        // })->get();
        //total role
        $roles = Role::pluck('name');


            foreach ($roles as $roleName) {
                $userCount = User::whereHas('roles', function($query) use($roleName) {
                    $query->where('name', $roleName);
                })->count();
            }
        //role count 
        $users_count = User::with(['roles' => function($q){
            $q->where('name', 'admin');
            }])->get();
        //role loop dashboard
        $role = Auth::user()->roles->pluck('name');

        ///// client dashboard
        $client_jobs =DB::table('projects')
         ->select('*')
         ->where('user_id', Auth::id())
         ->get();

            
        return view('home',compact('Total_users','Today_new_users','Total_Projects','roles'))
        ->with('role',$role)
        ->with('users_count',$users_count)
         ->with('client_jobs', $client_jobs);
    }

    public function approval()
    {
        return view('newuser.approval');
    }

}
