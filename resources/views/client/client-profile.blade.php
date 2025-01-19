@extends('layouts.app')
@section('content')
    @include('_modals.reserve-modify')
    @include('_modals.message')
    <h1>PERFIL CLIENTE</h1>
    <div class="content provider-menu">
        <div>
            <div class="menu-items">
                <a class="menu-item" href="{{ route('client.profile', 'reserves') }}">Ver mis reservas</a>
                <a class="menu-item" href="{{ route('client.profile', 'user_data') }}">Mis datos personales</a>

            </div>
            @if ($menu == 'user_data')
                <div class="userdata-list menu">
                 <p>{{ $user->nombre }} </p>
                </div>
            @endif
            @if ($menu == 'reserves')
                <div class="reserve-list menu">
                    <ul>
                        @foreach ($reservas as $reserva)
                            <li> {{ $reserva->experiencia->nombre }}</li>
                            <li>Adultos: {{ $reserva->adultos }}</li>
                            <li>Usuario: {{ $reserva->user->nombre }}</li>
                            <li>Precio por adulto: {{ $reserva->experiencia->precio_adulto }}€</li>
                            <li>Precio total: {{ $reserva->dimePrecioTotal() }}€</li>
                        @endforeach

                    </ul>
                </div>
            @endif

        </div>

    </div>
@endsection
