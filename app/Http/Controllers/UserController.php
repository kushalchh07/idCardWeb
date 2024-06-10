<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    
    public function index(){
        // Checking if the user authenicate or not
        if(Auth::check()){
            $email=Auth::user()->email;
            // dd($email);

            return view('users.index',compact('email'));
        }
    }
    public function loginForm(){
        return view('users.login');
    }

    public function loggedin(Request $request){
        $loginFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);
        $adminEmail='admin@gmail.com';
        $adminPassword='admin';

        // Check if the admin user alredy inthe db or not
        $admin=User::where('email',$adminEmail)->first();
        
        // dd($adminEmail);
        // If the admin user does not exist ,Default admin account creation during login 
        if(!$admin && $loginFields['email']==$adminEmail && $loginFields['password']=$adminPassword){
            $admin=User::create([
                'username'=>'admin',
                'email'=>$adminEmail,
                'password'=>Hash::make($adminPassword),
                'role'=>'admin'
            ]);

            Auth::login($admin);

            return redirect()->route('admin.index')->with('success','Admin logged in successfully');
        }
        else
        { 
            $user = User::where('email','=',$request->email)->first();
            // dd($admin);
            if($user){
                if(Hash::check($request->password, $user->password)){
                    if (Auth::attempt($loginFields)) {
                        if($user->role=='admin'){
                            return redirect()->route('admin.index');
                        }
                        else{
                            return redirect()->route('user.index');
                        }
                    }
                }
                else{
                    return back()->with('wrongPw',"Wrong user password... Try again.");
                }
            }
            else{
                return back()->with('noUser','No such account exists. Signup first...');
            }
        }
    }
        
    public function registerForm(){
    return view('users.register');
    }

    public function register(Request $request){
        // dd($request->all());
        $validation=$request->validate([
            'username'=>['required','min:6', Rule::unique('users','username')],
            'email'=>['required','email', Rule::unique('users','email')],
            'password'=>'required',
        ]);

        
        $validation['password']=bcrypt($validation['password']);
        
        $user=User::create($validation);

        Auth::login($user);

        return redirect()->route('user.index')->with('message','Successfuly logged in');


    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form')->with('message','Logged out successfully');

    }   
}
