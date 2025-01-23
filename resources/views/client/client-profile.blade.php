@extends('layouts.app')
@section('content')
    @include('_modals.reserve-modify')
    @include('_modals.message')
    
    <div class="content provider-menu">
        <h3>PERFIL CLIENTE</h3>
        <div>
            <div class="menu-items">
                <a class="menu-item" href="{{ route('client.profile', 'reserves') }}">Ver mis reservas</a>
                <a class="menu-item" href="{{ route('client.profile', 'user_data') }}">Mis datos personales</a>

            </div>
            @if ($menu == 'user_data')
                <div class="userdata-list menu">
                    <p>{{ Auth::user()->nombre }} </p>
                </div>
            @endif
            @if ($menu == 'reserves')
                <div class="reserve-list menu">
                    @foreach ($reservas as $reserva)
                        <p> {{ $reserva->experiencia->nombre }}</p>
                        <p>Fecha de reserva: {{ $reserva->exp_fecha->fecha }}</p>
                        <p>Adultos: {{ $reserva->menores }}</p>
                        <p>Precio por adulto: {{ $reserva->experiencia->precio_nino }}€</p>
                        <p>Adultos: {{ $reserva->adultos }}</p>
                        <p>Precio por adulto: {{ $reserva->experiencia->precio_adulto }}€</p>
                        <p>Precio total: {{ $reserva->dimePrecioTotal() }}€</p>
                    @endforeach
                </div>
            @endif

        </div>

    </div>
@endsection
