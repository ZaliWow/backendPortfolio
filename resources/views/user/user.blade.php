@extends('Layouts.Landing')

@section('title', 'home')

@section('content')
<h1>Lista de usuarios:</h1>


<ul>
    @forelse ($users as $user)
        <li>
        <a href="{{route("user.show",  $user->id)}}">{{ $user->name, $user->email}}</a> |
         <a href="{{route("user.edit",  $user->id)}}">  editar</a> </li> 
         <form action="{{route("user.destroy",  $user->id)}}"  method="POST">
            
            @csrf
            @method("DELETE")
            <input type="submit" value="DELETE">
            
         </form>
         
         @empty
        <li>No hay usuarios</li>

    @endforelse

</ul>

@endsection