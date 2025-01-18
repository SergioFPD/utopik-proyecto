@extends('layouts.app')
@section('content')
    @include('_modals.user-modify')
    @include('_modals.user-create')
    <div>
        <h1>Listado de usuarios</h1>
        <ul>
            @foreach ($usuarios as $user)
                @if ($user->rol != 'proveedor')
                    <li> {{ $user->nombre }} <button
                            onclick="openModalModifyUser('{{ $user->nombre }}','{{ $user->bloqueado }}', '{{ $user->rol }}', '{{ route('admin.update.user', $user->id) }}', '{{ route('admin.delete.user', $user->id) }}','modal-userdata')">Editar</button>
                    </li>
                @endif
            @endforeach

        </ul>

        <button onclick="openModal('modal-newuser')">Nuevo usuario</button>
    </div>
    <div>
        <h1>Listado de Proveedores</h1>
        <ul>
            @foreach ($usuarios as $user)
                @if ($user->rol == 'proveedor')
                    <li> {{ $user->nombre }} <button
                            onclick="openModalModifyUser('{{ $user->nombre }}','{{ $user->bloqueado }}', '{{ $user->rol }}', '{{ route('admin.update.user', $user->id) }}', '{{ route('admin.delete.user', $user->id) }}','modal-userdata')">Editar</button>
                    </li>
                @endif
            @endforeach

        </ul>

        <button onclick="openModal('modal-newuser')">Nuevo usuario</button>
    </div>
@endsection
