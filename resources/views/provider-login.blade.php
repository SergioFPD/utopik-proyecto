@extends('layouts.app')

@section('navMenu')
    @include('menus.nav-menu-profile')
@endsection

@section('content')
    <div class="content provider-login">

        @include('layouts.row-provider-login')


        @component('components.barra')
        @slot('fondo', 'fondo-blanco')
        @slot('color', 'fondo-azul-tres')
    @endcomponent
        {{-- Footer variable según la página mostrada --}}
        @component('components.footer')
            @slot('footerContent')
                Este es el footer del provider login
            @endslot
        @endcomponent
    </div>
@endsection
