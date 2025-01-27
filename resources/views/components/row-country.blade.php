<div class="row-country row">
    <div class="country-image">
        <img src="{{ $imagenPais }}" alt="">

        <div class="country-title">
            <p class="text-title text-small text-shadow">{{ __('labels.welcome-to') }}</p>
            <p class="text-title text-big text-shadow">{{ $pais }}</p>
        </div>
        {{-- <div class="barra-azul"></div> --}}
    </div>
    @component('components.barra-alpha')
        @slot('color', 'fondo-azul-dos')
    @endcomponent
    <div class="country-description">

        <div class="row-blue">
            <p>{{ $descripcion }}</p>
        </div>
        <div class="barra-blanca"></div>
    </div>
</div>
