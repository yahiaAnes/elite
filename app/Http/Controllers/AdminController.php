<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use App\Models\Book;

class AdminController extends Controller
{
    
    public function add_loanBook(){
        return view('admin.add_loanBook');
    }

    
    public function add_book(){
        return view('admin.add_book');
    }

    public function users(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    
    public function add_admin(){

        return view('admin.sus_admin.add_admin');
    }

    public function upload_Admin(REQUEST $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'usertype' => ['required', 'string', 'max:255'],
            'password' => ['required','min:8'],
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'usertype' => $request->input('usertype'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()
        ->with('message','upload successfuly');
    }

}
