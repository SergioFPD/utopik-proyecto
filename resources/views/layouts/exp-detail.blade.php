<div class="content detail">
    @include('_modals.reserve-create')
    <h3>Detalle de experiencia</h3>
    @if ($experiencia == null)
        <p>Experiencia no encontrada</p>
    @else
        <p>{{ $experiencia->nombre }}</p>
        <img style="width: 100%; height: 100%; object-fit: cover;"
            src="{{ $experiencia->imagen->first() ? asset('storage/' . $experiencia->imagen->first()->ruta) : asset('storage/images/no-image.jpg') }}"
            alt="">
        @if ($experiencia->vip)
            <p>Es una experiencia VIP</p>
        @endif
        <button onclick="openModalMakeReserve(
            '{{ $experiencia->getEncryptedId() }}', 
            {{ $experiencia->exp_fecha }}, 
            '{{ $experiencia->nombre }}', 
            '{{ $experiencia->imagen->first() 
                ? asset('storage/' . $experiencia->imagen->first()->ruta) 
                : asset('storage/images/no-image.jpg') }}'
        )">Reservar</button>

    @endif
</div>
