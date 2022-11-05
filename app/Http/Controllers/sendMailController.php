<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;

class sendMailController extends Controller
{
    public function index(){
        return view('sendMail');
    }
    
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required|min:5',
        ]);

        Mail::to("mhadn29@gmail.com")->send(new sendMail($request->only('email', 'name', 'message')));
        
        dd('pesan berhasil dikirim');
        // return redirect()->back();
    }

}
