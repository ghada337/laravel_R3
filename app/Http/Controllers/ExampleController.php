<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller

{
    public function show()
    {
        return 'welcome to my first controller';
    }

    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }
    public function login(Request $request)
    {
        // Retrieve email and password from the request
        $email = $request->input('email');
        $password = $request->input('password');

        // Return a view with the email and password
        return view('logged', ['email' => $email, 'password' => $password]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function error()
    {
        return view('404');
    }

    //day 12
    public function createSession(){
        // session()->put('testSession', 'my first session value');
        // session()->forget('testSession');
        session()->flash('testSession', 'my first session value');
        return 'session created  ';
    }
}

