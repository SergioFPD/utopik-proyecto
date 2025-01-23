<div class="content landing">

    @php
        $esVip = Auth::check() && (Auth::user()->vip || Auth::user()->rol == 'admin');
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
    @include('_partials.barra-azul')


    <div class="modal-body" id="modalPageContent">
        <!-- Aquí se cargará dinámicamente el contenido -->
    </div>

</div>
