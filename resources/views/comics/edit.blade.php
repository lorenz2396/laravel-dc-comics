@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="my-3 d-flex justify-content-between align-items-center">
            <h2>Modifica il fumetto: {{ $comic->title }}</h2>
            <a class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="/comics">
                Comics
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ $comic->description }}"</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
            </div>

            <button type="submit" class="btn btn-warning">Invia</button>
        </form>
    </div>
@endsection