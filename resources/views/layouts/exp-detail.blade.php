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

        @if (Auth::check() && Auth::user()->rol == 'cliente')
            <a class="btn-standard"
                onclick="insertModalPage('{{ route('form.reserve', $experiencia->getEncryptedId()) }}', 'modal-new-reserve')">
                <p>{{ __('buttons.make-reserve') }}</p>
            </a>
        @endif

    @endif

    <div class="modal-body" id="modalPageContent">
        <!-- Aquí se cargará dinámicamente el contenido -->
    </div>
</div>
