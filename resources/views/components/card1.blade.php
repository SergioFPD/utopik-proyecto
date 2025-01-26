<div class="card1 item @if ($esVip) gold @endif">
    <div class="img-content">
        <img src="{{$rutaImagen}}" alt="experience image">
        @if ($esVip)
        <div class="exp-vip-card1">
            <p class="vip-rotate-card1">VIP</p>
        </div>
    @endif
    </div>
    <div class="card1-content">
        <h3 class="card1-title">{{$nombreExperiencia}}</h3>
        <p class="card1-description">{{$descripcion}}</p>
        <p class="card1-country">{{$pais}}</p>
        <div class="button-container">
        <a class="btn-standard" href="{{ $rutaDetalle }}">
            <p>{{ __('buttons.reserve-detail') }}</p>
        </a>
    </div>
    </div>
</div>
