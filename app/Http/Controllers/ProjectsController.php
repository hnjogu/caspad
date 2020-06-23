<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;
use Illuminate\Support\Collection;

class ProjectsController extends Controller
{
        // permission
    function __construct()
    {
     // createpermissions permissions
        $this->middleware('permission:Projects-dashboard', ['only' => ['getprojectsindex']]);

            //Project create
        $this->middleware('permission:job-list', ['only' => ['index']]);
        $this->middleware('permission:job-create', ['only' => ['create','store']]);
        //$this->middleware('permission:job-edit', ['only' => ['edit','update']]);
        //$this->middleware('permission:job-delete', ['only' => ['destroy']]);
                    //my posted Project
        $this->middleware('permission:job-complete', ['only' => ['completedProjects']]);
       // $this->middleware('permission:job-create', ['only' => ['create','store']]);
                    //Project create
        $this->middleware('permission:promotions-list', ['only' => ['promotions']]);
        // download pdf
        $this->middleware('permission:pdfview-completedProjects', ['only' => ['clientpdf']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$rows = Project::all()->where('user_id', Auth::user()->id);

        $rows = Project::orderBy('id','DESC')
          ->where('user_id', Auth::user()->id)
          ->get();
        return view('projects.index', compact('rows'))
        ->with('rows', $rows);

        //return view('projects.index');



        //         //$data = User::orderBy('id','DESC')->paginate(5);
        // $data = User::orderBy('id','DESC')

        // ->get();
        // return view('users.index',compact('data'))
        //     //->with('i', ($request->input('page', 1) - 1) * 5);
        // ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = new Project();

        //$job = new Job();
        $lastProjectID = $job->orderBy('id', 'DESC')->pluck('id')->first();
        $newProjectID = 'CT/2020/TP-0' .str_pad($lastProjectID + 1, STR_PAD_LEFT);

        return view('projects.create', compact('newProjectID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'avatar' =>'nullable|file|mimes:audio/mpeg,mpga,mp3,wav,aac,mp4,mkv',
            'title' => 'required',
        ]);

        $file = $request->file('file_name');
        $destination_path = public_path(). '/storage/files';
        $extension = $file->getClientOriginalExtension();
        $files = $file->getClientOriginalName();
        $fileName = $files.'_'.time().'_'.$extension;
        $file->move($destination_path,$fileName);

        $row = new Project();

        //$row = new Job();
        $row ->user_id = $request->input('user_id');
        $row ->status = 'New';
        $row ->paid = 0;
        $row->file_name = $fileName;
        $row->project_id = $request->input('project_id');
        $row->customer_name = $request->input('customer_name');
        $row->length = $request->input('length');
        $row->accent = $request->input('accent');
        $row->amount_per_minute = $request->input('amount_per_minute');
        $row->total_amount = $request->input('total_amount');
        $row->no_of_speakers = $request->input(['no_of_speakers']);
        $row->title = $request->input(['title']);
        $row->instructions = $request->input(['instructions']);
        $row->project_type = $request->input(['project_type']);
        $row->subject = $request->input(['subject']);

        $row->save();

        return redirect()->route('projects.index')->with('success', 'Project Posted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getprojectsindex()
    {
               //role loop dashboard
        $role = Auth::user()->roles->pluck('name');
        return view('projects.project')
        ->with('role',$role);
    }

    public function completedProjects()
    {

        $rows = Project::orderBy('id','DESC')
         //->where('user_id', Auth::user()->id)
          ->where('status', 'Completed')->where('user_id', Auth::user()->id)
          ->get();
        return view('projects.completed', compact('rows'))
        ->with('rows', $rows);

        // $rows = Project::all()->where('status', 'Completed')->where('user_id', Auth::user()->id);
        // return view('projects.completed', compact('rows'));

       // return view('projects.completed');
    }

    public function promotions()
    {
        return view('projects.promotion');
    }
    // pdf download

    public function pdf($id)
    {
       $row = Project::find($id);
       $pdf =$pdf = PDF::loadView('clients.pdf', compact('row'));
       return $pdf->download('project.pdf', compact('row'));
    }

    public function clientpdf($id)
    {
        $Project = new Project();
        $Project =DB::table('projects')->where('id', $id)->get();

        $pdf = PDF::loadView('projects/pdfviews.clients', ['Project' => $Project])->setPaper('a4', 'landscape');
        // return $pdf->setPaper('a4')->stream();
        return $pdf->download('clients.pdf');

    }

    public function rate($id)
    {
       $row = Project::find($id);
       return view('projects.rate', compact('row'));
    }

    public function storeRate(Request $request, $id)
    {

        $row = Project::find($id);
        $row ->rate = $request->input('rate');
        $row->save();

        return redirect()->route('projects.completed')->with('success', 'Project Rated successfully.');
    }

}
