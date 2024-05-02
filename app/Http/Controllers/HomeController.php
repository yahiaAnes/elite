<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use App\Models\loanBook;
use App\Models\review;

class HomeController extends Controller
{
    public function goto(){
        return redirect('/acceuil');
    }
    public function gotos(){
        return redirect('/home');
    }

    public function acceuil(){
        return view('user.home');
    }

    public function redirect(){
        if(Auth::check()){
            if(Auth::user()->usertype == '1'){
                return view('admin.home');
            }
            
            elseif(Auth::user()->usertype == '2'){
                return view('admin.home');
            }
            
            elseif(Auth::user()->usertype == '0'){
                return view('user.home');
            }
        }
    }

    
    public function librery(){
        
        $books = Book::all();
        $reviews = review::all();
        return view('user.librery',compact('books','reviews'));
    }
}
