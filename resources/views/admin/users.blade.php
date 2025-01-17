@extends('layouts.app')
@section('content')
@include('_modals.user-modify')
@include('_modals.user-create')
    <h1>Listado de usuarios</h1>
    <ul>
        @foreach ($usuarios as $user)
            <li> {{ $user->nombre }} <button
                    onclick="openModalModifyUser({{ $user->id }}, '{{ $user->nombre }}','{{ $user->bloqueado }}', '{{ $user->rol }}')">Editar</button>
            </li>
        @endforeach

    </ul>

    <button onclick="openModal('modal-newuser')">Nuevo usuario</button>
@endsection
