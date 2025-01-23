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

    @if ($esCliente)
        <a class="btn-standard" href="#" onclick="openModalMakeReserve('{{ $id }}', {{ $fecha }}, '{{$titulo}}', '{{ $rutaImagen }}')"><p>Reservar</p></a>
        <a class="btn-standard" href="{{ $rutaDetalle }}"><p>Ver detalle</p></a>
    @endif
</div>
