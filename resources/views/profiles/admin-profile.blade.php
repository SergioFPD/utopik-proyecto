@extends('layouts.app')

@section('navMenu')
    @include('menus.nav-menu-profile')
@endsection
@section('content')

    <div class="content admin-menu">
        @component('components.row-profile')
            @slot('menuTitulo', __('labels.profile_admin'))
            @slot('menuSubTitulo', $menu)
        @endcomponent
        <div class="row">
            {{-- USERS --------------------------------- --}}
            @if ($menu == 'users')
                <div class="user-list menu">

                    @foreach ($usuarios as $customer)
                        @if ($customer->rol != 'proveedor' && $customer->email != Auth::user()->email)
                            <div class="user-content">
                                <p> {{ $customer->nombre }} </p>
                                    <button class="btn-standard"
                                    onclick="insertModalPage('{{ route('form.customer', $customer->getEncryptedId()) }}', 'modal-userdata', false, true)">{{ __('buttons.modify') }}</button>

                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            {{-- PROVIDERS --------------------------------- --}}
            @if ($menu == 'providers')
                <div class="user-list menu">
                    @foreach ($usuarios as $provider)
                        @if ($provider->rol == 'proveedor')
                            <div class="user-content">
                                <p> {{ $provider->nombre }} </p>
                                <button class="btn-standard"
                                    onclick="insertModalPage('{{ route('form.provider', $provider->getEncryptedId()) }}', 'modal-provider', false, true)">{{ __('buttons.modify_provider') }}</button>

                            </div>
                        @endif
                    @endforeach
                    <button
                        class="btn-standard"onclick="insertModalPage('{{ route('form.provider', 'new') }}', 'modal-provider', false, true)">{{ __('buttons.new_provider') }}</button>

                </div>
            @endif

            {{-- CONTRIES ------------------------- --}}
            @if ($menu == 'countries')
                <div class="country-list menu">

                    @foreach ($paises as $pais)
                        <div class="user-content">
                            <p> {{ $pais->pais }} </p>
                            <p> {{ $pais->descripcion }} </p>
                            <button class="btn-standard"
                                onclick="insertModalPage('{{ route('form.country', $pais->getEncryptedId()) }}', 'modal-country-form', true, true)">{{ __('buttons.modify_country') }}</button>

                        </div>
                    @endforeach
                    <button
                        class="btn-standard"onclick="insertModalPage('{{ route('form.country', 'new') }}', 'modal-country-form', true, true)">{{ __('buttons.new_country') }}</button>

                </div>
            @endif


        </div>

        {{-- Donde se inyectará la página modal --}}
        @include('_partials.page-content')

        {{-- Footer variable según la página mostrada --}}
        @component('components.footer')
            @slot('footerContent')
                Este es el footer del perfil administrador
            @endslot
        @endcomponent

    </div>


@endsection
