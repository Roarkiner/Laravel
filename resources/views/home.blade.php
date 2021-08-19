@extends('layouts/base')

@section('css')
    <link rel="stylesheet" href="assets/css/home.css">
@endsection

@section('title', 'Home')

@section('content')
    <h1>Bienvenue {{$name}} !</h1>
    <p>
        <br>
        Ceci est un site test. On s'amuse, youpi.
    </p>
    <img src="assets/img/cat.jpg" alt="Polite cat" id="main-illustration">
    <br>
    <legend>This is polite cat.</legend>
    <br>
@endsection
