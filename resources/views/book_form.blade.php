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
        <div>
            <label for="genre">Genre : </label>
            <select @error('genre') {{ 'class=input_error' }} @enderror name="genre" id="genre" required>
                <option value="Thriller">Thriller</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Mystery">Mystery</option>
                <option value="Literary Fiction">Literary Fiction</option>
                <option value="Horror">Horror</option>
                <option value="Historical">Historical</option>
                <option value="Romance">Romance</option>
                <option value="Western">Western</option>
                <option value="Bildungsroman">Bildungsroman</option>
                <option value="Speculative Fiction">Speculative Fiction</option>
                <option value="Science Fiction">Science Fiction</option>
                <option value="Dystopian">Dystopian</option>
                <option value="Magical Realism">Magical Realism</option>
                <option value="Realist Literature">Realist Literature</option>
            </select>
            @error('genre')
                <p class="error">{{ $errors->first('genre') }}</p>
            @enderror
        </div>
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