<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function index()
    {
       return view('web.index');
    }

    public function transcription()
    {
        return view('web.transcription');
    }

    public function about()
    {
        return view('web.about');
    }

    public function contact()
    {
        return view('web.contact');
    }

    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
      'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'email'      =>  $request->email,
            'message'   =>   $request->message
        );

     Mail::to('info@caspad.com')->send(new SendMail($data));
     return back()->with('success', 'Your E-mail was sent! Thank you for contacting us.');
    }

    public function tos()
    {
        return view('web.tos');
    }

    public function pp()
    {
        return view('web.pp');
    }

    public function cs()
    {
        return view('web.cs');
    }

    public function medical()
    {
        return view('web.medical');
    }

    public function research()
    {
        return view('web.research');
    }

    public function business()
    {
        return view('web.business');
    }

    public function academic()
    {
        return view('web.academic');
    }

    public function legal()
    {
        return view('web.legal');
    }

    public function podcast()
    {
        return view('web.podcast');
    }
}
