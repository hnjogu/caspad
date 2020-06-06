<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Illuminate\Contracts\Validation\Validator;
use Auth;
use App\permissions;

class PermissionsController extends Controller
{
    //
    function __construct()
    {
     // createpermissions permissions
         $this->middleware('permission:permissions-create', ['only' => ['getpermissions','createpermissions']]);
         $this->middleware('permission:permissions-edit', ['only' => ['geteditpermissions','editpermissions']]);
         $this->middleware('permission:permissions-list', ['only' => ['show','showpermissions']]);
         $this->middleware('permission:permissions-delete', ['only' => ['destroy']]);

    }

    public function showpermissions(Request $request)
    {
        // $permissions = new permissions;
        // $permissions = permissions::orderBy('id','DESC')->paginate(5);
        // return view('permissions/show',compact('permissions'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);

        $permissions = new permissions;
        //$permissions = permissions::orderBy('id','DESC')->paginate(5);
        $permissions = permissions::orderBy('id','DESC')->get();
        return view('permissions/show',compact('permissions'))
            //->with('i', ($request->input('page', 1) - 1) * 5);
        ->with('permissions', $permissions);
    }
   // for adding new entry
    public function getpermissions()
    {
        return view('permissions/createpermissions');
    }

    public function createpermissions(Request $request)
    {
    	    $permissions = new permissions;

    $validatedData = $request->validate([
            //'plantation_name' => 'required|unique:treeplant',
            'name' => 'required|unique:permissions',
            'guard_name' => 'required',
        ]);

        $permissions->user_name =  $request->get('user_name');
        $permissions->name =  $request->get('name');
        $permissions->guard_name =  $request->get('guard_name');
	    $permissions->save();

        return redirect('getpermissions')->with('message','Permission created successfully');
    }
    // for editing entry
    public function geteditpermissions(Request $request, $id)
    {
        $id =DB::table('permissions')->where('id', $id)->get();
        return view('permissions/edit')
        ->with('id', $id);
    }

    public function editpermissions(Request $request, $id)
    {  
        $permissions = new permissions;

        $validatedData = $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        
     permissions::updateOrCreate(['id'=>$request->get('id')],
    ['id' => $request->get('id'),'user_name' => $request->get('user_name'),'name' => $request->get('name'),'guard_name' => $request->get('guard_name')]); 
    //dd($permissions); 


     return redirect('showpermissions')->with('message','permissions Updated successfully');
    }
    public function destroy($id)
    {
        //
        DB::delete('DELETE FROM permissions WHERE id = ?',[$id]);
        return redirect('showpermissions')->with('message','permissions deleted successfully');
    }
}

