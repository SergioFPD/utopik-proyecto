<div>

    <h1>Listado de experiencias</h1>
    @if ($experiencias == null)
        <p>sin experiencias</p>
    @else
        <ul>
            @foreach ($experiencias as $experiencia)
                <li>{{ $experiencia->descripcion }}</li>
                @if ($experiencia->vip)
                    <p>Esta es una experiencia VIP</p>
                @endif
                <ul>
                    @foreach ($experiencia->actividad as $actividad)
                        <li>{{ $actividad->nombre }}: {{ $actividad->descripcion }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    @endif
</div>
