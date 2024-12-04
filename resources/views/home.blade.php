@extends('base.base')
@section('content')
    
    <h1 class="font-black font-inter text-5xl">ini home</h1>

    @if (Auth::check())
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white">Logout</button>
        </form>
    @else
        <button> <a href="/login">Login</a></button>
    @endif
@endsection
