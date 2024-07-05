@extends('Layouts.Landing')

@section('title', 'home')

@section('content')


<div>

    <h2>Crearas tu usuario</h2>
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <label for="name" >name</label>
        <input type="text" name="name">
        @error('name')
        <p>{{$message}}</p>
        @enderror
        <label for="email">email</label>
        <input type="text" name="email">
        @error('email')
        <p>{{$message}}</p>
        @enderror
        <label for="password">password</label>
        <input type="text" name="password">
        @error('password')
        <p>{{$message}}</p>
        @enderror
        
        <button>Crear usuario</button>
    
    </form>
    <a href="{{ route('user.user') }}">back</button>
</div>
@endsection