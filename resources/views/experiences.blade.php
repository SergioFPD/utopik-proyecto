@extends('layouts.app')

@section('content')
    <div class="content experiences">
        @if($paisElegido != null)
        @component('components.country')
            @slot('pais', $paisElegido->pais)
            @slot('descripcion', $paisElegido->descripcion)
            @slot('imagenPais', asset('storage/'.$paisElegido->imagen))
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

        {{-- Footer variable según la página mostrada --}}
        @component('components.footer')
            @slot('footerContent')
                Este es el footer del landing
            @endslot
        @endcomponent
    </div>
@endsection
