@extends('layouts.app')
@section('content')
    @include('_modals.reserve-modify')
    @include('_modals.message')
    <h1>PERFIL PROVEEDOR</h1>
    <div class="content provider-menu">
        <div>
            <div class="menu-items">
                <a class="menu-item" href="{{ route('provider.profile', 'experiences') }}">Listado de experiencias</a>
                <a class="menu-item" href="{{ route('provider.profile', 'reserves') }}">Listado de reservas</a>

            </div>
            @if ($menu == 'experiences')
                <div class="experience-list menu">
                    <ul>
                        @foreach ($experiencias as $experiencia)
                            <li> {{ $experiencia->nombre }}
                            </li>
                        @endforeach

                    </ul>
                </div>
            @endif
            @if ($menu == 'reserves')
                <div class="reserve-list menu">
                    <ul>
                        @foreach ($experiencias as $experiencia)
                            @if ($experiencia->reserva != null)
                                @foreach ($experiencia->reserva as $reserva)
                                <li> Nombre de experiencia: {{ $experiencia->nombre }}
                                </li>
                                    <li>Adultos: {{ $reserva->adultos }}</li>
                                    <li>Usuario: {{ $reserva->user->nombre }}</li>
                                    <li>Precio por adulto: {{ $reserva->precio_adulto }}€</li>
                                    <li>Precio total: {{ $reserva->dimePrecioTotal() }}€</li>
                                @endforeach
                            @endif
                        @endforeach

                    </ul>
                </div>
            @endif

        </div>

    </div>
@endsection
