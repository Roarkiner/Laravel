@extends('layouts/base')

@section('css')
    <link rel="stylesheet" href="assets/css/book_form.css">
@endsection

@section('script')
    <script src="assets/js/book_form.js" type="text/javascript" defer></script>
@endsection

@section('title', 'Add a Book')

@section('content')
    <h1>Add a Book</h1>
    <br>
    <form action="/add_book" method="post">
        @csrf
        <div>
            <label for="title">Title : </label>
            <input @error('title') {{ 'class=input_error' }} @enderror type="text" name="title" id="title" required>
            @error('title')
                <p class="error">{{ $errors->first('title') }}</p>
            @enderror
        </div>
        <div>
            <label for="author">Author : </label>
            <select @error('author_id') {{ 'class=input_error' }} @enderror name="author_id" id="author" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <p class="error">{{ $errors->first('author_id') }}</p>
            @enderror
        </div>
        <div>
            <label for="publication_year">Publication year : </label>
            <input @error('publication_year') {{ 'class=input_error' }} @enderror type="number" name="publication_year" id="publication_year" min="-8000" max="{{ date('Y'); }}" value="{{ date('Y'); }}" required>
            @error('publication_year')
                <p class="error">{{ $errors->first('publication_year') }}</p>
            @enderror
        </div>
        <fieldset class="checkbox @error('genres.*') {{ 'input_error' }} @enderror">
            <legend>Genre : </legend>
            @foreach ($genres as $genre)
                <div>
                    <input type="checkbox" name="genres[]" id="{{ str_replace(" ", "_", $genre->name) }}" value="{{ $genre->id }}" required>
                    <label for="{{ str_replace(" ", "_", $genre->name) }}">{{ $genre->name }}</label>
                </div>
            @endforeach
            @error('genres.*')
                <p class="error">{{ $errors->first('genres.*') }}</p>
            @enderror
        </fieldset>
        <div>
            <label for="synopsis">Synopsis : </label>
            <textarea @error('synopsis') {{ 'class=input_error' }} @enderror name="synopsis" id="synopsis" cols="30" rows="10" maxlength="1500" required></textarea>
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