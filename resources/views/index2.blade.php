@extends('layout.lading')

@section('title','Index')

@section('content')

@component('_components.card')

@slot('title', 'Página número 1')

    @slot('content','Contenido de la pagina')


@endcomponent
<br>

@component('_components.card')

@slot('title', 'Página número 2')

    @slot('content','Contenido de la pagina')


@endcomponent


<h1>Hola, este es el contenido del index</h1>   

@endsection
