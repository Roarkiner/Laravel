@extends('layouts/base')

@section('css')
    <link rel="stylesheet" href="assets/css/book_form.css">
@endsection

@section('script')
    <script src="assets/js/book_form.js" type="text/javascript" defer></script>
@endsection

@section('title', 'Modify a Book')  

@section('content')
    <h1>Modify a Book</h1>
    <br>
    <form action="/modify_book" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <div>
            <label for="title">Title : </label>
            <input @error('title') {{ 'class=input_error' }} @enderror type="text" name="title" id="title" value="{{ $book->title }}" required>
            @error('title')
                <p class="error">{{ $errors->first('title') }}</p>
            @enderror
        </div>
        <div>
            <label for="author">Author : </label>
            <select @error('author_id') {{ 'class=input_error' }} @enderror name="author_id" id="author" required>
                @foreach ($authors as $author)
                    @if ($author->name === $book->author->name)
                        <option value="{{ $author->id }}" selected>{{ $author->name }}</option>   
                    @else
                        <option value="{{ $author->id }}">{{ $author->name }}</option>   
                    @endif
                @endforeach
            </select>
            @error('author_id')
                <p class="error">{{ $errors->first('author_id') }}</p>
            @enderror
        </div>

        <div>
            <label for="publication_year">Publication year : </label>
            <input @error('publication_year') {{ 'class=input_error' }} @enderror type="number" name="publication_year" id="publication_year" min="-8000" max="{{ date('Y'); }}" value="{{ $book->publication_year }}" required>
            @error('publication_year')
                <p class="error">{{ $errors->first('publication_year') }}</p>
            @enderror
        </div>
        <fieldset class="checkbox @error('genres.*') {{ 'input_error' }} @enderror">
            <legend>Genre : </legend>
            @foreach ($genres as $genre)
                <div>
                    @php
                        $genre_names = [];
                        foreach($book->genres as $book_genre){
                            array_push($genre_names, $book_genre->name);
                        }
                    @endphp
                    @if (in_array($genre->name, $genre_names))
                        <input type="checkbox" name="genres[]" id="{{ str_replace(" ", "_", $genre->name) }}" value="{{ $genre->id }}" required checked>
                    @else
                        <input type="checkbox" name="genres[]" id="{{ str_replace(" ", "_", $genre->name) }}" value="{{ $genre->id }}" required>
                    @endif
                    <label for="{{ str_replace(" ", "_", $genre->name) }}">{{ $genre->name }}</label>
                </div>
            @endforeach
            @error('genres.*')
                <p class="error">{{ $errors->first('genres.*') }}</p>
            @enderror
        </fieldset>
        <div>
            <label for="synopsis">Synopsis : </label>
            <textarea @error('synopsis') {{ 'class=input_error' }} @enderror name="synopsis" id="synopsis" cols="30" rows="10" maxlength="1500" required>{{ $book->synopsis }}</textarea>
            <p id="char_lim"></p>
            @error('synopsis')
                <p class="error">{{ $errors->first('synopsis') }}</p>
            @enderror
        </div>
        <br>
        <input type="submit" value="Submit form">
    </form>
    <a href="/book" id="list-book-button">Return to list</a>
@endsection