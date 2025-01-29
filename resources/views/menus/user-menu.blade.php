<div class="modal-user-menu">
    @if (Auth::user()->vip)
        <p class="border-vip">VIP</p>
    @endif
    <div class="border-line">
        <p>{{ __('labels.welcome') }} {{ Auth::user()->nombre }}</p>
        <img src="{{ asset('storage/images/menu-down.svg') }}" alt="">
    </div>
    <div class="modal user-menu">
        <div class="user-menu-content">

            <a class="menu-user-item" href="{{ route('client.profile', 'user_data') }}">
                <p>Mi perfil</p>
            </a>
            <a class="menu-user-item" href="{{ route('client.profile', 'reserves') }}">
                <p>Mis reservas</p>
            </a>
            <a class="menu-user-item" href="{{ route('logout') }}">
                <p>Cerrar sesión</p>
            </a>

        </div>
    </div>
</div>
