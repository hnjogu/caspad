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
                          //grader
        $this->middleware('permission:graderprojects-find', ['only' => ['graderIndex']]);
        $this->middleware('permission:graderprojects-myprojects', ['only' => ['gradedJobs']]);
        $this->middleware('permission:graderprojects-earnings', ['only' => ['graderEarnings']]);

    }
    public function index()
    {
        $rows = Project::orderBy('id','DESC')
          ->where('status', 'New')->where('paid', 1)
          ->get();
        //$rows = Project::all()->where('status', 'New')->where('paid', 1);
        return view('projects.findwork', compact('rows'))
        ->with('rows', $rows);
    }

    public function workspace($id)
    {
        $row = Project::find($id);
        $row->status = 'Claimed';
        $row->claimed_by = Auth::user()->id;
        $row->save();
        return view('projects.workspace', compact('row'));
    }

    public function graderWorkspace($id)
    {
        $row = Project::find($id);
        $row->status = 'Grading';
        $row->grader_id = Auth::user()->id;
        $row->save();
        return view('projects.grader_workspace', compact('row'));
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
    }

    public function workspaceStore(Request $request, $id)
    {

        $row = Project::find($id);
        $row ->status = 'Submitted';
        $row ->freelancer = Auth::user()->name;
        $row ->freelancer_id = Auth::user()->id;
        $row->body = $request->input('body');
        $row->save();

        return redirect()->route('findwork.index')->with('success', 'Project Submitted successfully.');
    }

    public function graderworkspaceStore(Request $request, $id)
    {

        $row = Project::find($id);
        $row ->status = 'Completed';
        $row ->graded_by = Auth::user()->name;
        $row->body = $request->input('body');
        $row->accuracy = $request->input('accuracy');
        $row->formatting = $request->input('formatting');
        $row->comments = $request->input('comments');
        $row->save();

        return redirect()->route('grader.index')->with('success', 'Project Completed successfully.');
    }

    public function freelancerPending()
    {
       $row = Project::all()->where('status', 'Claimed')
                ->where('claimed_by', Auth::user()->id);
        return view('projects.freelancer_pending', compact('row'));
    }

    public function freelancerResume()
    {
        $rows = Project::where('claimed_by', Auth::user()->id)
                    ->where('status', 'Claimed')
                    ->get();
                foreach ($rows as $row)
                {
                    return view('projects.freelancer_resume', compact('row'));
                }
    }

    public function graderPending()
    {
       $row = Project::all()->where('status', 'Grading')
                ->where('grader_id', Auth::user()->id);
        return view('projects.grader_pending', compact('row'));
    }

    public function graderResume()
    {
        $rows = Project::where('grader_id', Auth::user()->id)
                    ->where('status', 'Grading')
                    ->get();
                foreach ($rows as $row)
                {
                    return view('projects.grader_resume', compact('row'));
                }
    }

}
