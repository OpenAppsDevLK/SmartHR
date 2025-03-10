<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;
use Auth;
use Mail;
use App\Mail\ForgotPasswordMail;


class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

    public function forgot_password(Request $request)
    {
        //echo "Forgot";
        //die();

        return view('forgot_password');

    }


    public function forget_password_post(Request $request)
    {

        //dd($request->all());    
        $count = User::where('email', '=', $request->email)->count();
        if ($count > 0) {
            $user = User::where('email', '=', $request->email)->first();

            $random_pass = rand(111111, 999999);

            $user->password = Hash::make($random_pass);

            $user->save();

            $user->random_pass = $random_pass;

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Password has been send as a email.');

        } else {
            return redirect()->back()->with('error', 'Email Not Found');
        }
    }

    public function register(Request $request)
    {
        //echo "Register";
        //die();

        return view('register');
    }

    public function register_post(Request $request)
    {
        //dd($request->all());

        //Check the user inputs on HTML Form
        $user = request()->validate([

            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', ' The User Successfuly Registed');
    }


    public function checkEmail(Request $request)
    {
        //This code will check the email existence of the database.
        $email = $request->input('email');
        $isExists = User::where('email', $email)->first();
        if ($isExists) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }


    public function login_post(Request $request)
    {

                    // Validate the request (email and password fields should not be empty)
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Attempt to log in with 'remember' functionality based on user input
            $remember = $request->has('remember'); // Check if the 'Remember Me' checkbox was selected


        //dd($request->all());

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            //0: Employee 1 HR:	
            //Only HR can login to the system
            if (Auth::User()->is_role == '1') {
                return redirect()->intended('admin/dashboard'); //Add a middleware on kernel.php, add middleware file on middleware folder AdminMiddleware.php

            } else if (Auth::User()->is_role == '0') {
                return redirect()->intended('employee/dashboard'); //Add a middleware on kernel.php, add middleware file on middleware folder EmployeeMiddleware.php
            } else {
                return redirect('/')->with('error', 'No HR avaliblen please check');
            }

        } else {
            return redirect()->back()->with('error', 'Please enter the correct login details');
        }

    }

    public function logout()
    {
        //user will logout form the system.
        Auth::logout();
        return redirect(url('/'));
    }

}
