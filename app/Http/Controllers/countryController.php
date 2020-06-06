<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use DB;

class countryController extends Controller
{
    //


    function fetch2(Request $request)
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
