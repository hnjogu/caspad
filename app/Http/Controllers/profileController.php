<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Spatie\Permission\Models\Role;

class profileController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:profile-view', ['only' => ['viewprofile']]);
         $this->middleware('permission:profile-edit', ['only' => ['geteditprofile','updateprofile']]);
    }
    //
    public function viewprofile($id)
    {
        $user = Auth::user();
        $user_id =DB::table('users')->where('id', $id)->get();
        return view('profile.view', compact('user'))
        ->with('user_id', $user_id);
    }

    public function geteditprofile(Request $request, $id)
    {
        $id =DB::table('users')->where('id', $id)->get();
        $country_list = DB::table('country')
            ->groupBy('country')
            ->get();
        return view('profile/edit')
        ->with('id', $id)
        ->with('country_list', $country_list);
    }

    public function updateprofile(Request $request, $id)
    {  
        $User = new User;

        $validatedData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'country' => 'required',
            'capitalcity' => 'required',
            'company' => 'required',
            'id_number' => 'required',
            'mobile' => 'required|string|min:10|max:13',
        ]);
        
     User::updateOrCreate(['id'=>$request->get('id')],
    ['id' => $request->get('id'),'name' => $request->get('name'),'lastname' => $request->get('lastname'),'email' => $request->get('email'),'country' => $request->get('country'),'capitalcity' => $request->get('capitalcity'),'company' => $request->get('company'),'id_number' => $request->get('id_number'),'mobile' => $request->get('mobile')]); 
    //dd($User); 

       $User_data =DB::table('users')->select('*')->where('id', $id)->first();
       
       return redirect('viewprofile/'.$User_data->id)->with('message','Record updated successfully');

    }

    function fetch3(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('country')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
            $output = '<option value="">Select '.ucfirst($dependent).'</option>';
            foreach($data as $row)
             {
              $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
             }
             echo $output;
    }

}
