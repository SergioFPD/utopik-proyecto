<div class="content landing">

    @php
        $esVip = Auth::check() && (Auth::user()->vip || Auth::user()->rol == 'admin');
        $esCliente = Auth::check() && Auth::user()->rol == 'cliente';
    @endphp
    @component('components.country')
        @slot('pais', 'Perú')
        @slot('descripcion')
            Perú, tierra de maravillas, combina historia milenaria con paisajes impresionantes.
            Desde la majestuosa ciudadela de Machu Picchu hasta los desiertos de Nazca y la biodiversidad de la Amazonía, ofrece
            aventuras únicas y cultura vibrante.
            Descubre su gastronomía premiada y la calidez de su gente en cada rincón.
        @endslot
        @slot('imagenPais', asset('storage/images/countries/peru.jpg'))
    @endcomponent
    <div class="content-margin row">
        <h1>{{ __('app.experience_list') }}</h1>
        @if ($experiencias == null)
            <p>{{ __('app.no_experience_list') }}</p>
        @else
            @foreach ($experiencias as $experiencia)
                @if (!$experiencia->vip || ($experiencia->vip && $esVip))
                    @component('components.experience-card-list')
                        @slot('nombreExperiencia', $experiencia->nombre)
                        @slot('rutaImagen')

                            {{ $experiencia->imagen->first()
                                ? asset('storage/' . $experiencia->imagen->first()->ruta)
                                : asset('storage/images/no-image.jpg') }}

                        @endslot
                        @slot('fechas')
                            @foreach ($experiencia->exp_fecha as $fecha)
                                <p>{{ $fecha->fecha }}</p>
                            @endforeach
                        @endslot
                        @slot('esVip', $experiencia->vip)
                        @slot('descripcion', $experiencia->descripcion)
                        @slot('precio_adulto', $experiencia->getFormatedPrice())
                        @slot('dias', $experiencia->duracion)

                        @slot('esCliente', $esCliente)
                        {{-- Datos para abrir el formulario modal de reservas --}}
                        @slot('ruta', route('form.reserve', $experiencia->getEncryptedId()))
                        @slot('modal', 'modal-new-reserve')

                        @slot('rutaDetalle', route('experience.detail', $experiencia->nombre))

                        @slot('actividades')
                            @foreach ($experiencia->actividad as $actividad)
                                <li>{{ $actividad->nombre }}: {{ $actividad->descripcion }}</li>
                            @endforeach
                        @endslot
                    @endcomponent
                @endif
            @endforeach
        @endif

    </div>

    @component('components.barra')
        @slot('color', 'barra-azul')
    @endcomponent
    @include('components.row-video')
    @include('components.footer')
    {{-- Donde se inyectará la página modal --}}
    @include('_partials.page-content')
</div>
