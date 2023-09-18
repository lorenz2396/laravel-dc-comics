@extends('layouts.app')

@section('content')
    <div class="container home-links d-flex flex-column align-items-center">
        <a class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            href="/" aria-current="page">
            Home
        </a>
        <a class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            href="{{route('home.index')}}">
            Index Comics
        </a>
        <a class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            href="{{route('home.create')}}">
            Create
        </a>
    </div>
@endsection