<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller

{
    public function show()
    {
        return 'welcome to my first controller';
    }

    public function login(Request $request)
    {
        // Retrieve email and password from the request
        $email = $request->input('email');
        $password = $request->input('password'); 

        // Return a view with the email and password
        return view('logged', ['email' => $email, 'password' => $password]);
    }
}
