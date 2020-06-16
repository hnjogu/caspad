<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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
        $rows = Project::all()->where('status', 'Completed')->where('rate', '!=', 0);
        return view('projects.ratedJobs', compact('rows'));
    }
}
