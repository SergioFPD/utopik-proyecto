<div class="carousel-container">
    @if ($experiencias == null)
        <p class="text-title text-small texto-azul-dos">Sin experiencias</p>
    @else
        <p class="text-title text-small texto-azul-dos">Descubre lo último</p>
        <div class="owl-carousel">
            @foreach ($experiencias as $experiencia)
                @if (!$experiencia->vip || ($experiencia->vip && $esVip))
                    @component('components.card1')
                        @slot('rutaImagen')

                            {{ $experiencia->imagen->first()
                                ? asset('storage/' . $experiencia->imagen->first()->ruta)
                                : asset('storage/images/no-image.jpg') }}

                        @endslot
                        @slot('nombreExperiencia', $experiencia->nombre)
                        @slot('esVip', $experiencia->vip)
                        @slot('descripcion', $experiencia->descripcion_corta)
                        @slot('pais', $experiencia->ciudad->pais->pais)
                        @slot('rutaDetalle', route('experience.detail', $experiencia->nombre))
                        {{-- @slot('precio_adulto', $experiencia->getFormatedPrice())
                    @slot('dias', $experiencia->duracion)

                    @slot('esCliente', $esCliente) --}}
                    @endcomponent
                @endif
            @endforeach
        </div>
    @endif
</div>
