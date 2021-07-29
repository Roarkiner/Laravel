<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function showHome(){
        return view('home', ['name' => 'Len']);
    }

    public function showAbout(){
        return view('about');
    }

    public function showBook(){
        return view('book', ['books' => Book::all()]);
    }

    public function showContact(){
        return view('contact');
    }
}
