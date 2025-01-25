<div class="card-experience @if ($esVip) gold @endif">
    <div class="card-exp-container">

        <div class="card-exp-left">
            <div class="exp-fechas">{{ $fechas }}</div>
            <div class="fundido"></div>
            <img src="{{ $rutaImagen }}" alt="">
        </div>
        @if ($esVip)
            <div class="exp-vip">
                <p class="vip-rotate">VIP</p>
            </div>
        @endif
        <div class="card-exp-right">
            <div class="exp-info">
                <h3>{{ $nombreExperiencia }}</h3>
                <p>{{ $descripcion }}</p>

            </div>
            <div class="exp-price">
                <p>Desde: {{ $precio_adulto }}€</p>
                <p>Duración: {{ $dias }} días</p>

            </div>

            <div class="buttons">
                <a class="btn-standard" href="{{ $rutaDetalle }}">
                    <p>{{ __('buttons.reserve-detail') }}</p>
                </a>
                @if ($esCliente)
                    <a class="btn-standard" onclick="insertModalPage('{{ $ruta }}', '{{ $modal }}')">
                        <p>{{ __('buttons.make-reserve') }}</p>
                    </a>
                @endif
            </div>
        </div>
    </div>

</div>
