<div class="navmenu">
    <div class="container">
        <div class="left">
            <h1>{{ __('app.parrafo1') }}</h1>
            @include('_partials.lang')
            <a href="{{ route('landing') }}">INICIO</a>
        </div>

        <!-- Lado derecho del menú -->
        <div class="right">



            @auth
                <p>Hola {{ Auth::user()->nombre }}@if (Auth::user()->vip)
                        , eres VIP
                    @endif
                </p>
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

        </div>
    </div>

    

</div>
