@extends('base')

@section('css')
    <link rel="stylesheet" href="assets/css/books.css">
@endsection

@section('script')
    <script type="text/javascript" defer>
        var data = @php echo ($books->toJson()); @endphp;
    </script>
@endsection

@section('title', 'Books')

@section('content')
    <h1>Books</h1>
    <br>
    <h2>List of Books</h2>
    <br>
    <table>
        <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Parution year</th>
            <th>Genre</th>
        </thead>
        @foreach ($books as $book)
            <tr>
                <td class='title-td' data-id="{{ $book->id }}">{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>{{ $book->genre }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <div class='none background-dark fixed'></div>
    <div class='none book-detail fixed'>
        <img src="/assets/img/close.svg" alt="Close button" id="close-icon">
        <h2 id="title-detail">{{ $books[0]->title }}</h2>
        <p id="author-detail">Author : <span>{{ $books[0]->author }}</span></p>
        <p id="parution-detail">Year of publication : <span>{{ $books[0]->publication_year }}</span></p>
        <p id="genre-detail">Genre : <span>{{ $books[0]->genre }}</span></p>
        <p id="synopsis-detail">Résumé : <span>{{ $books[0]->synopsis }}</span></p>
    </div>
@endsection
