<div id="modal-new-activity" class="modal center @if ($errors->all() && $errors->has('modal-new-activity')) show @endif">
    <div class="modal-content">
        <p id="nombre">Nueva actividad en experiencia</p>
        <span class="close">&times;</span>
        <form action="{{ route('activity.store') }}" method="post">
            @csrf
            <input type="hidden" id="experiencia_id" name="experiencia_id">
            <label for="">Nombre</label>
            <input type="text" name="nombre">
            @error('nombre')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">Descripción</label>
            <textarea name="descripcion" rows="5"></textarea>
            @error('descripcion')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="slider">Día</label>
            <div class="slider-value">Cantidad: <span id="slider-value-days">1</span></div>
            <input type="range" id="slider" name="dia" min="1" max="20" step="1"
                value="1" oninput="updateSliderValue(this.value, 'slider-value-days')">

            <input class="btn-standard" type="submit" value="{{ __('buttons.add-activity') }}">
        </form>

    </div>
</div>
