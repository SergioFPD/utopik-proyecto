@extends('layouts.app')
@section('content')
    @include('_modals.user-modify')
    @include('_modals.user-create')
    @include('_modals.provider-create')
    @include('_modals.message')


    <div class="content admin-menu">
        @component('components.row-profile')
            @slot('menuTitulo', 'Perfil administrador')
        @endcomponent
        <div>
            <div class="menu-items">
                <a class="menu-item @if ($menu == 'users') select @endif"
                    href="{{ route('admin.profile', 'users') }}">
                    <p>Listado de usuarios</p>
                </a>
                <a class="menu-item  @if ($menu == 'providers') select @endif"
                    href="{{ route('admin.profile', 'providers') }}">
                    <p>Listado de Proveedores</p>
                </a>

            </div>
            @if ($menu == 'users')
                <div class="user-list menu">

                    @foreach ($usuarios as $user)
                        @if ($user->rol != 'proveedor' && $user->email != Auth::user()->email)
                            <div class="user-content">
                                <p> {{ $user->nombre }} </p>
                                <button class="btn-standard"
                                    onclick="openModalModifyUser('{{ $user->nombre }}','{{ $user->bloqueado }}', '{{ $user->rol }}', '{{ route('admin.update.user', $user->getEncryptedId()) }}', '{{ route('admin.delete.user', $user->getEncryptedId()) }}','modal-userdata')">Editar</button>

                            </div>
                        @endif
                    @endforeach

                </div>
            @endif
            @if ($menu == 'providers')
                <div class="user-list menu">
                    @foreach ($usuarios as $user)
                        @if ($user->rol == 'proveedor')
                            <div class="user-content">
                                <p> {{ $user->nombre }} </p>
                                <button class="btn-standard"
                                    onclick="openModalModifyUser('{{ $user->nombre }}','{{ $user->bloqueado }}', '{{ $user->rol }}', '{{ route('admin.update.user', $user->id) }}', '{{ route('admin.delete.user', $user->id) }}','modal-userdata')">Editar</button>

                            </div>
                        @endif
                    @endforeach
                    <button class="btn-standard" onclick="openModal('modal-provider')">Nuevo proveedor</button>
                </div>
            @endif


        </div>

    </div>

    </div>
@endsection
