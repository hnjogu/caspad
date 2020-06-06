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
}
