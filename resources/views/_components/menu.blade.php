<div style="background-color: aqua">
    <h1>ESTE ES EL MENU</h1>
    <p>Usuario es: </p>
    <a href="{{ route('landing') }}">INICIO</a>
    <a href="{{ route('admin.profile', 'users') }}">
        <button>Zona admin</button>
    </a>
    <a href="{{ route('provider.profile', 'experiences') }}">
        <button>Zona proveedores</button>
    </a>
    <a href="{{ route('client.profile', 'reserves') }}">
        <button>Zona cliente</button>
    </a>
    <button onclick="openModal('modal-register')">Registrarse</button>
    @include('_modals.register')
    @include('_modals.login')
</div>
