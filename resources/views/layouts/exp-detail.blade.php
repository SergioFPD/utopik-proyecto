<div>
    <h3>Detalle de experiencia</h3>
    @if ($experiencia == null)
        <p>Experiencia no encontrada</p>
    @else
        
    <p>{{$experiencia->nombre}}</p>
    @if ($experiencia->vip)
        <p>Es una experiencia VIP</p>
    @endif

    @endif
</div>
