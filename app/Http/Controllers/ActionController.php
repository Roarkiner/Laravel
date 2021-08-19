<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

use Symfony\Component\VarDumper\VarDumper;

class ActionController extends Controller
{
    public function addBook(Request $request){
        $request->validate(
            [
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|integer',
            'genres.*' => 'required|exists:genres,id',
            'synopsis' => 'required|max:1500'
            ],
            [
                'genres.*.exists' => 'The selected genre is invalid.'
            ]
        );

        $book = new Book;
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publication_year = $request->publication_year;
        $book->synopsis = $request->synopsis;
        $book->save();
        $book->genres()->attach($request->genres);

        $request->session()->flash('added', true);

        return redirect('book');
    }

    public function deleteBook(Request $request){

        $book = Book::findOrFail($request->id);
        $book->genres()->detach();
        $book->delete();
        $request->session()->flash('deleted', true);

        return redirect('book');
    }

    public function modifyBook(Request $request){
        $request->validate(
            [
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|integer',
            'genres.*' => 'required|exists:genres,id',
            'synopsis' => 'required|max:1500'
            ],
            [
                'genres.*.exists' => 'The selected genre is invalid.'
            ]
        );

        $book = Book::findOrFail($request->id);
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publication_year = $request->publication_year;
        $book->synopsis = $request->synopsis;
        $book->genres()->sync($request->genres);
        $book->save();

        $request->session()->flash('modified', true);

        return redirect('book');
    }
}
