<div id="modal-new-reserve" class="modal center @if ($errors->all() && $errors->has('modal-new-reserve')) show @endif">
    <div class="modal-content">
        <p>{{ __('labels.new_reserve') }}</p>
        <p id="nombre">{{ __('labels.new_reserve') }}</p>
        <span class="close">&times;</span>
        <div class="res-image-container" style="height: 200px; width: 100%; overflow: hidden">
            <img id="res-image" src="" style="width: 100%" alt="">
        </div>
        <div>
            <form action="{{ route('reserve.create') }}" method="post">
                @csrf
                <input type="hidden" id="experiencia_id" name="experiencia_id">
                <label for="slider">{{ __('labels.num_adult') }}</label>
                <div class="slider-value"><span id="slider-value-adults">1</span></div>
                <input type="range" name="adultos" min="1" max="10" step="1" value="1"
                    oninput="updateSliderValue(this.value, 'slider-value-adults')">

                <label for="slider">{{ __('labels.num_child') }}</label>
                <div class="slider-value"><span id="slider-value-child">1</span></div>
                <input type="range" name="menores" min="1" max="10" step="1" value="1"
                    oninput="updateSliderValue(this.value, 'slider-value-child')">

                <label for="">{{ __('labels.select_date') }}</label>
                <select id="data_options" name="exp_fecha_id" required>

                </select>

                <input type="submit" value="{{ __('labels.pay_reserve') }}">
            </form>
        </div>
    </div>
</div>
