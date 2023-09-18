@extends('layouts.app')
@section('content')
    <div class="container d-flex flex-column justify-content-center">
        <div class="my-2 d-flex justify-content-between align-items-center">
            <h2 class="text-center">Info fumetto: {{ $comic->title }}</h2>
            <a class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="/comics">
                Comics
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-center row">
            <img class="col-6 p-5" src="{{ $comic->thumb }}" alt="">
            <ul class="list-group p-5 col-6">
                <li class="list-group-item">
                    Descrizione: {{ $comic->description }}
                </li>
                <li class="list-group-item">
                    Prezzo: {{ $comic->price }}
                </li>
                <li class="list-group-item">
                    Serie: {{ $comic->series }}
                </li>
                <li class="list-group-item">
                    Tipo: {{ $comic->type }}
                </li>
                <li class="list-group-item">
                    Data di vendita: {{ $comic->sale_date }}
                </li>
            </ul>
        </div>
    </div>
@endsection