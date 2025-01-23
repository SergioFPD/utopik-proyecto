<div id="modal-new-reserve" class="modal center @if ($errors->all() && $errors->has('modal-new-reserve')) show @endif">
    <div class="modal-content">
        {{-- Se recibe variable "experiencia" --}}
        <p id="nombre">{{ __('labels.new_reserve') }}</p>
        <p>{{ $experiencia->nombre }}</p>
        <span class="close">&times;</span>
        <div class="res-image-container" style="height: 200px; width: 100%; overflow: hidden">

            <img src="{{ $experiencia->imagen->first()
                ? asset('storage/' . $experiencia->imagen->first()->ruta)
                : asset('storage/images/no-image.jpg') }}"
                style="width: 100%" alt="">
        </div>
        <div>
            <form action="{{ route('reserve.create') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $experiencia->getEncryptedId() }}" name="experiencia_id">
                <label for="slider">{{ __('labels.num_adult') }} ({{ $experiencia->precio_adulto }}€)</label>
                <div class="slider-value"><span id="slider-value-adults">1</span></div>
                <input type="range" id="value-adults" name="adultos" min="1" max="10" step="1"
                    value="1"
                    oninput="updateSliderValue(this.value, 'slider-value-adults', {{ $experiencia->precio_adulto }}, {{ $experiencia->precio_nino }})">

                <label for="slider">{{ __('labels.num_child') }} ({{ $experiencia->precio_nino }}€)</label>
                <div class="slider-value"><span id="slider-value-child">0</span></div>
                <input type="range" id="value-child" name="menores" min="0" max="10" step="1"
                    value="0"
                    oninput="updateSliderValue(this.value, 'slider-value-child', {{ $experiencia->precio_adulto }}, {{ $experiencia->precio_nino }})">
                <p id="total-price">TOTAL: {{ $experiencia->precio_adulto }}€</p>

                <label for="">{{ __('labels.select_date') }}</label>
                <select id="data_options" name="exp_fecha_id" required>
                    <option value="" selected disabled>Selecciona</option>
                    @foreach ($experiencia->exp_fecha as $fecha)
                        <option value="{{ $fecha->id }}">

                            @component('components.fecha')
                                @slot('fecha', $fecha->fecha)
                            @endcomponent
                        </option>
                    @endforeach

                </select>

                <input class="btn-standard" type="submit" value="{{ __('buttons.pay-reserve') }}">
            </form>
        </div>
    </div>
</div>
