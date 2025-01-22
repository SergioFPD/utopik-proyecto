<div class="card-experience-list">
    <h3>{{ $experiencia->nombre }}</h3>
    <div style="width: 400px; height: 200px">
        <img  style="width: 100%; height: 100%; object-fit: cover;" src="{{ $experiencia->imagen->first() ? asset("storage/".$experiencia->imagen->first()->ruta) : asset('images/no-image.jpg') }}"
            alt="">
    </div>
    @if ($experiencia->vip)
        <p>Esta es una experiencia VIP</p>
    @endif
    <ul>
        @foreach ($experiencia->actividad as $actividad)
            <li>{{ $actividad->nombre }}: {{ $actividad->descripcion }}</li>
        @endforeach
    </ul>
    @auth
        @if (Auth::user()->rol == 'cliente')
            <button
                onclick="openModalMakeReserve('{{ $experiencia->getEncryptedId() }}',{{ $experiencia->exp_fecha }})">Reservar</button>
            <a href="{{route('experience.detail', $experiencia->nombre)}}">Ver detalle</a>
        @endif
    @endauth
</div>
