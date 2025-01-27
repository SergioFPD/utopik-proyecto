@php

    if (Auth::user()) {
        $rol = Auth::user()->rol;
        $logeado = true;
    } else {
        $rol = 'guest';
        $logeado = false;
    }

    if ($rol == 'admin') {
        $nomBoton = 'Perfil admin';
        $rutaPerfil = route('admin.profile', 'users');
    } elseif ($rol == 'proveedor') {
        $nomBoton = 'Perfil proveedor';
        $rutaPerfil = route('provider.profile', 'experiences');
    } else {
        $nomBoton = 'Acceso empresas';
        $rutaPerfil = route('provider.login'); // TODO
    }

@endphp
{{-- Modales ocultos --}}
@include('_modals.register')

<div class="navmenu">
    <div class="container">
        <div class="left">
            <div class="img-logo">
                <a href="{{ route('home') }}">
                    <div class="logo"></div>
                </a>
            </div>
        </div>

        <div class="middle">
            @component('menus.country-select')
                @slot('listaPaises')
                    @if ($paises != null)
                        @foreach ($paises as $pais)
                            <a class="country-select-item" href="{{ route('country', $pais->pais) }}">
                                <p>{{ __('countries.' . $pais->pais) }}</p>
                            </a>
                        @endforeach
                    @endif
                @endslot

            @endcomponent
        </div>

        <!-- Lado derecho del menú -->
        <div class="right">

            <div class="right-up">
                @if (($logeado && $rol != 'cliente') || !$logeado)
                    <a class="btn-standard gold-button" href="{{ $rutaPerfil }}">
                        <p>{{ $nomBoton }}</p>
                    </a>
                @endif
            </div>

            <div class="right-down">
                @if ($rol == 'cliente')
                    @include('menus.user-menu')
                @endif
                @if (!$logeado)
                    @include('_modals.login')
                @endif
                @if (!$logeado)
                    <a class="btn-standard" onclick="openModal('modal-register')">
                        <p>{{ __('buttons.register') }}</p>
                    </a>
                @endif
                @if ($logeado && $rol != 'cliente')
                    <a class="btn-standard alpha2" href="{{ route('logout') }}">
                        <p>{{ __('buttons.logout') }}</p>
                    </a>
                @endif
                @include('_partials.lang')
            </div>

        </div>
    </div>
</div>
<style>
    .navmenu .img-logo .logo {
        background-image: url('{{ asset('storage/images/utopik_logo_alpha.png') }}');
    }

    @media (max-width: 800px) {

        .navmenu .img-logo .logo {
            background-image: url('{{ asset('storage/images/utopik_circle2_alpha.png') }}');
        }

        .navmenu .img-logo {
            width: 110px;
        }
    }
</style>
