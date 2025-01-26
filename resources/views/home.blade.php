@extends('layouts.app')

@section('content')
    <div class="content home">
        @php
            $esVip = Auth::check() && (Auth::user()->vip || Auth::user()->rol == 'admin');
            $esCliente = Auth::check() && Auth::user()->rol == 'cliente';
        @endphp
        @component('components.row-profile')
            @slot('menuTitulo', 'El home')
        @endcomponent
        @component('components.barra')
            @slot('fondo', 'fondo-azul-dos')
            @slot('color', 'fondo-blanco')
        @endcomponent
        @include('layouts.row-exp-cards')
        @component('components.barra')
            @slot('fondo', 'fondo-blanco')
            @slot('color', 'fondo-azul-dos')
        @endcomponent
        @include('layouts.row-video')
        @component('components.barra')
            @slot('fondo', 'fondo-azul-dos')
            @slot('color', 'fondo-azul-tres')
        @endcomponent

        {{-- Footer variable según la página mostrada --}}
        @component('components.footer')
            @slot('footerContent')
                Este es el footer del home
            @endslot
        @endcomponent
    </div>
@endsection
