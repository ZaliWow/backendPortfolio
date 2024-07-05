@extends('Layouts.Landing')

@section('title', 'home')

@section('content')

<form action="{{route("user.update", $user->id)}}" method="POST">
    @method("PUT")
    @csrf
    <label for="name"></label>
    <input type="text" name="name" value="{{ $user->name }}">
    @error('name')
        <p>{{$message}}</p>
        @enderror
    <label for="email"></label>
    <input type="text" name="email" value="{{ $user->email }}">
    @error('email')
        <p>{{$message}}</p>
        @enderror

    <input type="submit" value="Update">
</form>
@endsection