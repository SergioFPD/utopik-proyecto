@extends('layouts.app')
@section('content')
    @include('_modals.user-modify')
    @include('_modals.user-create')
    @include('_modals.provider-create')
    @include('_modals.message')
    <h1>PERFIL ADMINISTRADOR</h1>
    <div class="content admin-menu">
        <div>
            <div class="menu-items">
                <a class="menu-item" href="{{ route('admin.profile', 'users') }}">Listado de usuarios</a>
                <a class="menu-item" href="{{ route('admin.profile', 'providers') }}">Listado de Proveedores</a>

            </div>
            @if ($menu == 'users')
                <div class="user-list menu">
                    <ul>
                        @foreach ($usuarios as $user)
                            @if ($user->rol != 'proveedor' && $user->email != Auth::user()->email)
                                <li> {{ $user->nombre }} <button
                                        onclick="openModalModifyUser('{{ $user->nombre }}','{{ $user->bloqueado }}', '{{ $user->rol }}', '{{ route('admin.update.user', $user->getEncryptedId()) }}', '{{ route('admin.delete.user', $user->getEncryptedId()) }}','modal-userdata')">Editar</button>
                                </li>
                            @endif
                        @endforeach

                    </ul>

                    <button onclick="openModal('modal-newuser')">Nuevo usuario</button>
                </div>
            @endif
            @if ($menu == 'providers')
                <div class="provider-list menu">
                    <ul>
                        @foreach ($usuarios as $user)
                            @if ($user->rol == 'proveedor')
                                <li> {{ $user->nombre }} <button
                                        onclick="openModalModifyUser('{{ $user->nombre }}','{{ $user->bloqueado }}', '{{ $user->rol }}', '{{ route('admin.update.user', $user->id) }}', '{{ route('admin.delete.user', $user->id) }}','modal-userdata')">Editar</button>
                                </li>
                            @endif
                        @endforeach

                    </ul>

                    <button onclick="openModal('modal-provider')">Nuevo proveedor</button>
                </div>
            @endif

        </div>

    </div>
@endsection
