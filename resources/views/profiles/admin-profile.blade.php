@extends('layouts.app')

@section('navMenu')
    @include('menus.nav-menu-profile')
@endsection
@section('content')
    @include('_modals.user-modify')
    @include('_modals.user-create')
    @include('_modals.provider-create')
    @include('_modals.message')


    <div class="content admin-menu">
        @component('components.row-profile')
            @slot('menuTitulo', __('labels.profile_admin'))
            @slot('menuSubTitulo', $menu)
        @endcomponent
        <div>

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
