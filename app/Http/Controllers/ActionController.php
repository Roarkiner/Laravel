<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class ActionController extends Controller
{
    public function addBook(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|integer',
            'genre' => 'required',
            'synopsis' => 'required|max:1500'
        ]);

        $book = new Book;
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publication_year = $request->publication_year;
        $book->genre = $request->genre;
        $book->synopsis = $request->synopsis;
        $book->save();

        $request->session()->flash('added', true);

        return redirect('book');
    }

    public function deleteBook(Request $request){
        Book::where('id', $request->id)->delete();

        $request->session()->flash('deleted', true);

        return redirect('book');
    }

    public function modifyBook(Request $request){
        $request->validate([
            'id' => 'required|integer',
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|integer',
            'genre' => 'required',
            'synopsis' => 'required|max:1500'
        ]);

        Book::where('id', $request->id)->update([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'publication_year' => $request->publication_year,
            'genre' => $request->genre,
            'synopsis' => $request->synopsis,
        ]);;

        $request->session()->flash('modified', true);

        return redirect('book');
    }
}
