@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-2 d-flex justify-content-between align-items-center">
            <a class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="/" aria-current="page">
                Home
            </a>
            <h2>Fumetti</h2>
            <a class="btn btn-success" href="{{ route('home.create') }}" role="button">Inserisci nuovo fumetto</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <th scope="row">{{ $comic->id }}</th>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('home.show', ['home'=> $comic->id]) }}">
                                Info
                            </a>
                            <a class="btn btn-warning" href="{{ route('home.edit', ['home'=> $comic->id]) }}">Modifica</a>
                            <form class="d-inline-block" action="{{ route('home.destroy', ['home'=> $comic->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection