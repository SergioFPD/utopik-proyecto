@extends('layouts.app')

@section('navMenu')
    @include('menus.nav-menu-profile')
@endsection
@section('content')
    @include('_modals.reserve-modify')
    @include('_modals.message')

    <div class="content provider-menu">
        @component('components.row-profile')
            @slot('menuTitulo', __('labels.profile_user'))
            @slot('menuSubTitulo', $menu)
        @endcomponent
        <div>
            @if ($menu == 'user_data')
                <div class="userdata-list menu">
                    <p>{{ __('labels.name') }}: {{ Auth::user()->nombre }} </p>
                    <p>{{ __('labels.email') }}: {{ Auth::user()->email }} </p>
                    
                    @if (Auth::user()->puntos < 30)
                    <p>{{ __('labels.vip_points') }}: {{ Auth::user()->puntos }} </p>
                    <p>{{ __('labels.need_pints', ['points' => 30 - Auth::user()->puntos]) }} </p>
                    @else
                    <p>{{ __('labels.you_are_vip') }}</p>

                    @endif
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
