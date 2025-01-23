<div class="content landing">
    
    @include('_modals.reserve-create')
    @php
        $esVip = Auth::check() && Auth::user()->vip;
        $esCliente = Auth::check() && Auth::user()->rol == 'cliente';
    @endphp

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
                    @slot('esVip', $experiencia->vip)

                    @slot('actividades')
                        @foreach ($experiencia->actividad as $actividad)
                            <li>{{ $actividad->nombre }}: {{ $actividad->descripcion }}</li>
                        @endforeach
                    @endslot
                    @slot('esCliente', $esCliente)
                    @slot('id', $experiencia->getEncryptedId())
                    @slot('fecha', $experiencia->exp_fecha)
                    @slot('titulo', $experiencia->nombre)

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
    @include('_components.barra-azul')
</div>
