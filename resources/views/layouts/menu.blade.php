<div class="navmenu">
    <div class="container">
        <div class="left">
            <div class="img-logo">
                <a href="{{ route('landing') }}"><img src="{{ asset('storage/images/utopik_logo_alpha.png') }}"
                        alt=""></a>
            </div>
        </div>

        <!-- Lado derecho del menú -->
        <div class="right">
            @auth
                @if (Auth::user()->rol === 'cliente')
                    @include('_modals.user-menu')
                @endif
                <a href="{{ route('logout') }}">
                    <button>{{ __('buttons.logout') }}</button>
                </a>

                <!-- Comprobar el rol del usuario -->
                @if (Auth::user()->rol === 'admin')
                    <p>Tienes permisos de Administrador.</p>
                    <a href="{{ route('admin.profile', 'users') }}">
                        <button>Zona admin</button>
                    </a>
                @elseif (Auth::user()->rol === 'cliente')
                    <p>Eres un Usuario cliente.</p>
                    <a href="{{ route('client.profile', 'reserves') }}">
                        <button>Zona cliente</button>
                    </a>
                @elseif (Auth::user()->rol === 'proveedor')
                    <p>Eres un Usuario proveedor.</p>
                    <a href="{{ route('provider.profile', 'experiences') }}">
                        <button>Zona proveedores</button>
                    </a>
                @endif
            @else
                <button onclick="openModal('modal-register')">{{ __('buttons.register') }}</button>
                @include('_modals.register')
                @include('_modals.login')
            @endauth
            @include('_partials.lang')

        </div>
    </div>
</div>
