@extends('Layouts.Landing')

@section('title', 'home')

@section('content')
<h1>{{$user->name}}</h1>
<p>{{$user->email}}</p>
@endsection