<div id="modal-new-experience" class="modal center @if ($errors->all() && $errors->has('modal-new-experience')) show @endif">
    <div class="modal-content">
        <p id="nombre">{{ __('labels.new_experience') }}</p>
        <span class="close">&times;</span>

        {{-- Listado de errores --}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <form id="form" action="{{ route('experience.create') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="">{{ __('labels.name') }}</label>
            <input type="text" name="nombre">
            @error('nombre')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">{{ __('labels.city') }}</label>
            <input type="text" name="ciudad">
            @error('ciudad')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="pais">{{ __('labels.select_country') }}</label>
            <select id="pais" name="pais_id" required>
                <option value="">{{ __('labels.select_country') }}</option>
                @foreach ($paises as $pais)
                    <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                @endforeach
            </select>

            <label for="">{{ __('labels.description') }}</label>
            <textarea name="descripcion" rows="5"></textarea>
            @error('descripcion')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div>
                <label for="image">Seleccionar imagen:</label>
                @error('image')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="file" name="image" id="image-experience" accept="image/*" required>
            </div>
            <div style="margin-top: 20px;">
                <!-- Contenedor para la previsualización -->
                <img id="preview" src="#" alt="Previsualización de la imagen"
                    style="display: none; width: 200px; height: auto; border: 1px solid #ccc; padding: 5px;">
            </div>

            <label>Fechas:</label>
            @error('fechas*')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <div>
                <input type="date" id="fechaInput">
                <button type="button" id="agregarFechaBtn">Añadir Fecha</button>
            </div>
            <ul id="listaFechas"></ul>
            <!-- Campo oculto para enviar las fechas al backend -->
            <input type="hidden" name="fechas[]" id="fechasHidden" value="" required>


            <label for="">{{ __('labels.is_vip') }}</label>
            <input type="hidden" name="vip" value="0" />
            <input type="checkbox" name="vip" value="1" />

            <label for="">{{ __('labels.active') }}</label>
            <input type="hidden" name="activa" value="0" />
            <input type="checkbox" name="activa" value="1" checked />

            <label for="slider">{{ __('labels.days_count') }}</label>
            <div class="slider-value"><span id="slider-value-one">1</span></div>
            <input type="range" id="slider" name="duracion" min="1" max="20" step="1"
                value="1" oninput="updateSliderValue(this.value, 'slider-value-one')">

            <label for="">{{ __('labels.price_adult') }}</label>
            <div class="slider-value"><span id="slider-value-adult">200</span>€</div>
            <input type="range" id="slider" name="precio_adulto" min="200" max="10000" step="50"
                value="200" oninput="updateSliderValue(this.value, 'slider-value-adult')">

            <label for="">{{ __('labels.price_child') }}</label>
            <div class="slider-value"><span id="slider-value-child">200</span>€</div>
            <input type="range" id="slider" name="precio_nino" min="200" max="10000" step="50"
                value="200" oninput="updateSliderValue(this.value, 'slider-value-child')">
                <input class="btn-standard" type="submit" value="{{ __('buttons.create-experience') }}">
        </form>

    </div>
</div>
