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

class AdminController extends Controller
{
    public function __construct()
    {

             // createpermissions permissions
        $this->middleware('permission:rateddJobs-view', ['only' => ['rateddJobs']]);

    }
    public function index()
    {
        return view('caspad.index');
    }

    public function settings()
    {
        $user = Auth::user();
        return view('caspad.profile', compact('user'));
    }

    public function rateddJobs()
    {
        // $rows = Project::orderBy('id','DESC')
        $rows = Project::all()
          ->where('status', 'Completed')->where('rate', '!=', 0);
        //$rows = Project::all()->where('status', 'Completed')->where('rate', '!=', 0);
        return view('projects.ratedJobs', compact('rows'))
         ->with('rows', $rows);
    }
}
