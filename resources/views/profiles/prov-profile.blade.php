@extends('layouts.app')

@section('navMenu')
    @include('menus.nav-menu-profile')
@endsection
@section('content')

    <div class="content provider-menu">
        @component('components.row-profile')
            @slot('menuTitulo', __('labels.profile_provider'))
            @slot('menuSubTitulo')
                @if ($menu == 'experiences')
                    {{ __('labels.my_experiences') }}
                @else
                    {{ __('labels.my_bookings') }}
                @endif
            @endslot
        @endcomponent
        <div class="row">

            @if ($menu == 'experiences')
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
                                        <a class="btn-standard"
                                            href="{{ route('activity.form', ['exp_id' => $experiencia->getEncryptedId(), 'act_id' => $actividad->getEncryptedId(), 'mode' => 'modify']) }}">
                                            <p>{{ __('buttons.modify_activity') }}</p>
                                        </a>
                                    @endforeach
                                </ul>
                            @else
                                <p>{{ __('labels.no_experiences') }}</p>
                            @endif
                            <div>
                                <a class="btn-standard"
                                    href="{{ route('experience.modify', $experiencia->getEncryptedId()) }}">
                                    <p>{{ __('buttons.modify_experience') }}</p>
                                </a>
                                <a class="btn-standard"
                                    href="{{ route('activity.form', ['exp_id' => $experiencia->getEncryptedId(), 'act_id' => $experiencia->getEncryptedId(), 'mode' => 'create']) }}">
                                    <p>{{ __('buttons.add_activity') }}</p>
                                </a>

                            </div>
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
                                    {{-- Se muestra botón de evaluar sólo si la reserva tiene 0 puntos --}}
                                    @if ($reserva->puntuacion == 0)
                                        <button class="btn-standard"
                                            onclick="insertModalPage('{{ route('form.evaluate', $reserva->getEncryptedId()) }}', 'modal-reserve-rate', false, false)">{{ __('buttons.evaluate') }}</button>
                                    @else
                                    <p>Se ha evaluado con: {{ $reserva->puntuacion }} puntos</p>

                                    @endif


                                </div>
                            @endforeach
                        @else
                            <div>
                                <p>{{ __('labels.no_reservations') }}</p>
                            </div>
                        @endif
                    @endforeach

                </div>
            @endif

        </div>

        {{-- Donde se inyectará la página modal --}}
        @include('_partials.page-content')

        {{-- Footer variable según la página mostrada --}}
        @component('components.footer')
            @slot('footerContent')
                Este es el footer del perfil proveedor
            @endslot
        @endcomponent
    </div>
@endsection
