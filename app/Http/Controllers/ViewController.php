<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

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
        return view('book', ['books' => Book::all()->sortBy('title') ]);
    }

    public function showBookForm(){
        return view('book_form', ['authors' => Author::all()->sortBy('name'), 'genres' => Genre::all()->sortBy('name')]);
    }

    public function showModifyBookForm(Request $request){
        return view('modify_book_form', ['book' => Book::findOrFail($request->id), 'id' => $request->id, 'authors' => Author::all()->sortBy('name'), 'genres' => Genre::all()->sortBy('name')]);
    }

    public function showContact(){
        return view('contact');
    }
}
