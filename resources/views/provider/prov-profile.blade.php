@extends('layouts.app')
@section('content')
    @include('_modals.reserve-modify')
    @include('_modals.message')

    <div class="content provider-menu">
        @component('components.row-profile')
            @slot('menuTitulo', 'Perfil de empresa')
        @endcomponent
        <div>
            <div class="menu-items">
                <a class="menu-item"
                    href="{{ route('provider.profile', 'experiences') }}">{{ __('buttons.my_experiences') }}</a>
                <a class="menu-item"
                    href="{{ route('provider.profile', 'reserves') }}">{{ __('buttons.my_reservations') }}</a>

            </div>
            @if ($menu == 'experiences')
                <h3>{{ __('app.your_experiences') }}</h3>
                <div class="experience-list menu">

                    @foreach ($experiencias as $experiencia)
                        <div class="experience-container">
                            <p>Nombre: {{ $experiencia->nombre }}</p>
                            <p>Descripción: {{ $experiencia->descripcion }}</p>
                            @if ($experiencia->reserva->count() > 0)
                                <p>TIENE {{ $experiencia->reserva->count() }} RESERVAS</p>
                            @endif
                            @if ($experiencia->actividad->count() > 0)
                                <p>Actividades:</p>
                                <ul>
                                    @foreach ($experiencia->actividad as $actividad)
                                        <li>{{ $actividad->nombre }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>SIN ACTIVIDADES</p>
                            @endif
                            <a class="btn-standard" href="{{ route('experience.modify', $experiencia->getEncryptedId()) }}">
                                <p>{{ __('buttons.modify_experience') }}</p>
                            </a>
                        </div>
                    @endforeach

                    <br><br>
                    <a class="btn-standard" href="{{ route('experience.form') }}">
                        <p>{{ __('buttons.add_experience') }}</p>
                    </a>

                </div>
            @endif
            @if ($menu == 'reserves')
                <div class="reserve-list menu">
                    @foreach ($experiencias as $experiencia)
                        @if ($experiencia->reserva != null)
                            @foreach ($experiencia->reserva as $reserva)
                                <div class="reserve-content">
                                    <h3> Nombre de experiencia: {{ $experiencia->nombre }}</h3>
                                    <p>Adultos: {{ $reserva->adultos }}</p>
                                    <p>Cliente: {{ $reserva->user->nombre }}</p>
                                    <p>Email del cliente: {{ $reserva->user->email }}</p>
                                    <p>Precio total de la reserva: {{ $reserva->dimePrecioTotal() }}€</p>
                                </div>
                            @endforeach
                        @else
                            <div>
                                <p>SIN RESERVAS</p>
                            </div>
                        @endif
                    @endforeach

                </div>
            @endif

        </div>

    </div>
@endsection
