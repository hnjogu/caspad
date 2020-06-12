<?php

namespace App\Http\Controllers;

use App\Project;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class FindworkController extends Controller
{
            // permission
    function __construct()
    {
     // createpermissions permissions
        $this->middleware('permission:findwork-jobs', ['only' => ['index']]);

            //Project create
        $this->middleware('permission:freelancer-workspace', ['only' => ['workspace']]);
        $this->middleware('permission:job-unclaim', ['only' => ['unclaim']]);
        //$this->middleware('permission:job-edit', ['only' => ['edit','update']]);
        //$this->middleware('permission:job-delete', ['only' => ['destroy']]);
                    
        $this->middleware('permission:job-complete', ['only' => ['completedProjects']]);
                    //metric
        $this->middleware('permission:freelancer-metrics', ['only' => ['metrics']]);
        $this->middleware('permission:freelancer-viewMetrics', ['only' => ['viewMetrics']]);
        $this->middleware('permission:freelancer-earnings', ['only' => ['freelancerEarnings']]);
        // download pdf
        $this->middleware('permission:pdfview-completedProjects', ['only' => ['clientpdf']]); 

    }
    public function index()
    {
        $rows = Project::all()->where('status', 'New')->where('paid', 1);
        return view('projects.findwork', compact('rows'));
    }

    public function workspace($id)
    {
        $row = Project::find($id);
        return view('projects.workspace', compact('row'));
    }

    public function unclaim($id)
    {
        $row = Project::find($id);
        $row->status = 'New';
        $row->save();

        return redirect()->route('findwork.index')->with('success', 'Project Unclaimed Successfully');
    }

    public function completedProjects()
    {
        $rows = Project::all()->where('status', 'Completed')->where('freelancer_id', Auth::user()->id);
        return view('projects.freelancer_completedjobs', compact('rows'));
    }

    public function metrics()
    {
        $rows = Project::all()->where('status', 'Completed')->where('freelancer_id', Auth::user()->id);
        return view('projects.metrics', compact('rows'));
    }

    public function viewMetrics($id)
    {
        $row = Project::find($id);
        return view('projects.view_metrics', compact('row'));
    }

    public function freelancerEarnings()
    {
        $rows = Project::all()->where('status', 'Completed')->where('freelancer_id', Auth::user()->id);
        return view('projects.freelancer_earnings', compact('rows'));
    }

    public function graderIndex()
    {
        $rows = Project::all()->where('status', 'Submitted')->where('paid', 1);
        return view('projects.grader_index', compact('rows'));
    }

    public function gradedJobs()
    {
        $rows = Project::all()->where('status', 'Completed')->where('grader_id', Auth::user()->id);
        return view('projects.graded_jobs', compact('rows'));
    }

    public function graderEarnings()
    {
        $rows = Project::all()->where('status', 'Completed')->where('grader_id', Auth::user()->id);
        return view('projects.grader_earnings', compact('rows'));

        return view('projects.findwork');
    }

    // public function workspace()
    // {
    //     return view('projects.workspace');

    // }
}
