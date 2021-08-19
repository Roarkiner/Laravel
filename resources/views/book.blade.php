@extends('layouts/base')

@section('css')
    <link rel="stylesheet" href="assets/css/book.css">
@endsection

@section('script')
    <script type="text/javascript" defer></script>
    <script src="assets/js/book.js" type="text/javascript" defer></script>
@endsection

@section('title', 'Books')

@section('content')
    <h1>Books</h1>
    <br>
    <h2>List of Books</h2>
    <br>
    @if (session()->exists('deleted'))
        <span class="status">Book was deleted successfully</span>
        <br>
    @endif

    @if (session()->exists('added'))
        <span class="status">Book was added succefully</span>
        <br>
    @endif

    @if (session()->exists('modified'))
        <span class="status">Book was modified succefully</span>
        <br>
    @endif

    <table>
        <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Parution year</th>
            <th>Genre</th>
            <th>Delete</th>
            <th>Update</th>
        </thead>
        @foreach ($books as $book)
            <tr>
                <td class='title-td' data-author="{{ $book->author->name }}" 
                data-publication_year="{{ $book->publication_year }}" 
                data-genre="
                @foreach ($book->genres as $key => $genre)
                    @if ($key === count($book->genres) - 1)
                        {{ $genre->name }}    
                    @else
                        {{ $genre->name . ", "}}
                    @endif
                @endforeach" 
                data-synopsis="{{ $book->synopsis }}">
                    {{ $book->title }}
                </td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>
                    @foreach ($book->genres as $key => $genre)
                        @if ($key === count($book->genres) - 1)
                            {{ $genre->name }}    
                        @else
                            {{ $genre->name . ", "}}
                        @endif
                    @endforeach
                </td>
                <td class='delete'>
                    <form action="/delete_book" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $book->id }}" />
                        <input class="delete-button" type="image" src="assets/img/delete.svg" alt="Submit Form" />
                    </form>
                </td>
                <td class='modify'>
                    <form action="/modify_book_form" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $book->id }}" />
                        <input class="modify-button" type="image" src="assets/img/modify.svg" alt="Submit Form" />
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <div class='none background-dark fixed'></div>
    <div class='none book-detail fixed'>
        <img src="/assets/img/close.svg" alt="Close button" id="close-icon">
        <h2 id="title-detail">{{ $books[0]->title }}</h2>
        <p>Author : <span id="author-detail">{{ $books[0]->author->name }}</span></p>
        <p>Year of publication : <span id="parution-detail">{{ $books[0]->publication_year }}</span></p>
        <p>Genres : <span id="genre-detail">{{ $books[0]->genre }}</span></p>
        <p>Synopsis : <span id="synopsis-detail">{{ $books[0]->synopsis }}</span></p>
    </div>

    <a href="/book_form" id="add-book-button">Add a book</a>
@endsection
