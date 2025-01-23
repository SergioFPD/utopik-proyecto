<div class="card-experience-list">
    <h3>{{ $nombreExperiencia }}</h3>
    <div style="width: 400px; height: 200px; overflow: hidden">
        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ $rutaImagen }}" alt="">
    </div>
    @if ($esVip)
        <p>Esta es una experiencia VIP</p>
    @endif
    <ul>
        {{ $actividades }}

    </ul>
    <div>
        @if ($esCliente)
            <a class="btn-standard" onclick="insertModalPage('{{ $ruta }}', '{{ $modal }}')">
                <p>{{ __('buttons.make-reserve') }}</p>
            </a>
        @endif
        <a class="btn-standard" href="{{ $rutaDetalle }}">
            <p>{{ __('buttons.reserve-detail') }}</p>
        </a>
    </div>
</div>
