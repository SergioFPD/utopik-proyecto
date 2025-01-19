<div style="background-color: aqua">
    <h1>ESTE ES EL MENU</h1>
    <a href="{{ route('landing') }}">INICIO</a>
    @auth
        <p>Hola {{ Auth::user()->nombre }}@if (Auth::user()->vip), eres VIP @endif</p>
        <a href="{{ route('logout') }}">
            <button>Logout</button>
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
        @else
            <p>Tu rol es: {{ Auth::user()->rol }}</p>
        @endif
    @else
        @include('_modals.login')
        <button onclick="openModal('modal-register')">Registrarse</button>
        @include('_modals.register')
    @endauth



</div>
