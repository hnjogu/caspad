<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsController extends Controller
{

	        // permission
    function __construct()
    {
     // accounts

        $this->middleware('permission:accounts-list', ['only' => ['index']]);
       //  $this->middleware('permission:job-create', ['only' => ['create','store']]);
       //  //$this->middleware('permission:job-edit', ['only' => ['edit','update']]);
       //  //$this->middleware('permission:job-delete', ['only' => ['destroy']]);
       //              //my posted Project
       //  $this->middleware('permission:job-complete', ['only' => ['completedProjects']]);
       // // $this->middleware('permission:job-create', ['only' => ['create','store']]);
       //              //Project create
       //  $this->middleware('permission:promotions-list', ['only' => ['promotions']]);
       //  // download pdf
       //  $this->middleware('permission:pdfview-completedProjects', ['only' => ['clientpdf']]); 

    }

    public function index()
    {
        return view('accounts.dashboard');
    }
}
