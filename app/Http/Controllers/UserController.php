<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\country;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:user-list');
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-activeDeactive', ['only' => ['activeDeactive']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        //$data = User::orderBy('id','DESC')->paginate(5);
        $data = User::orderBy('id','DESC')

        ->get();
        return view('users.index',compact('data'))
            //->with('i', ($request->input('page', 1) - 1) * 5);
        ->with('data', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $country_list = DB::table('country')
            ->groupBy('country')
            ->get();
        return view('users.create',compact('roles'))
        ->with('country_list', $country_list);
    }

    function fetch(Request $request)
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'country' => 'required',
            'capitalcity' => 'required',
            'company' => 'required',
            'mobile' => 'required|unique:users,mobile,|min:10|max:13',
            'id_number' => 'required|unique:users,id_number',

        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $Business_name = Auth::user()->Business_name;

        $user = User::find($id);
        return view('users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $country_list = DB::table('country')
            ->groupBy('country')
            ->get();
        return view('users.edit',compact('user','roles','userRole'))
        ->with('country_list', $country_list);
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
        $user = new User();
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'country' => 'required',
            'capitalcity' => 'required',
            'company' => 'required',
            //'mobile' => 'required|mobile|unique:users,mobile,|min:10|max:13'.$id,
            //'mobile' => 'required|string|min:10|max:13|unique:users,mobile,'.$user->id,
            //'mobile' => 'required|string|min:10|max:13|unique:users,mobile,'.Auth::user()->id,
            'mobile' => 'required|string|min:10|max:13',
            //'mobile' => 'required|unique:users,mobile,|min:10|max:13',
           //'id_number' => 'required|id_number|unique:users,id_number,'.$user->id,
            //'id_number' => 'required|unique:users,id_number,'.Auth::user()->id,
            'id_number' => 'required',

        ]);


        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    public function activeDeactive(Request $request)
    {
        if (Auth::id() != $request->user_id) {
          $user = User::findOrFail($request->user_id);
          $user->active = !$user->active;
          $user->save();
          return redirect()->route("users.index")->with('success', $user->name." status has been changed!");
        } else  {
          return redirect()->back()->withErrors(['You can\'t change your status!']);
        }
    }
    // password part

    public function showChangePasswordForm(){
        return view('auth.passwords.changepassword');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->password_status = ($request->get('password_status'));
        $user->save();
        //return redirect()->back()->with("success","Password changed successfully !");
        Auth::logout();
        return redirect('/login');

    }

    // user approve
    public function approveDisapprove(Request $request)
    {
        if (Auth::id() != $request->user_id) {
          $user = User::findOrFail($request->user_id);
          $user->approved_at = !$user->approved_at;
          $user->save();
          return redirect()->route("users.index")->with('success', $user->name." status has been changed!");
        } else  {
          return redirect()->back()->withErrors(['You can\'t change your status!']);
        }
    }
}
