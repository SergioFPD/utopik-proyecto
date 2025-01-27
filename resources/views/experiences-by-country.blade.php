@extends('layouts.app')
@php
    $esVip = Auth::check() && (Auth::user()->vip || Auth::user()->rol == 'admin');
    $esCliente = Auth::check() && Auth::user()->rol == 'cliente';
@endphp

@section('navMenu')
    @include('menus.nav-menu')
@endsection

@section('content')
    <div class="content experiences">
        @if ($paisElegido != null)
            @component('components.row-country')
                @slot('pais')
                {{__('countries.'.$paisElegido->pais)}}
                @endslot
                @slot('descripcion', $paisElegido->descripcion)
                @slot('imagenPais', asset('storage/' . $paisElegido->imagen))
            @endcomponent
        @endif
        @component('components.barra')
            @slot('color', 'fondo-blanco')
            @slot('fondo', 'fondo-azul-dos')
        @endcomponent
        @include('layouts.row-experiences')

        @component('components.barra')
            @slot('fondo', 'fondo-blanco')
            @slot('color', 'fondo-azul-tres')
        @endcomponent

        @include('layouts.row-last-experiences')
        @component('components.barra')
            @slot('fondo', 'fondo-blanco')
            @slot('color', 'fondo-azul-dos')
        @endcomponent

        {{-- Footer variable según la página mostrada --}}
        @component('components.footer')
            @slot('footerContent')
                Este es el footer del landing
            @endslot
        @endcomponent
    </div>
@endsection
