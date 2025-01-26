@extends('layouts.app')

@section('content')
    {{-- Recibe variable $experiencia y $mode en caso de modificacion --}}

    @php
        // Declaro variables del formulario para cada caso: Crear/Modificar
        if ($mode == 'modify') {
            $titulo = __('labels.modify_experience');
            $action = route('experience.update', $experiencia->getEncryptedId());
            $boton = __('buttons.save_experience');
            $nombre = $experiencia->nombre;
            $la_ciudad = $experiencia->ciudad->ciudad;
            $el_pais = $experiencia->ciudad->pais->pais;
            $descripcion = $experiencia->descripcion;
            if ($experiencia->vip) {
                $vip = 'checked';
            } else {
                $vip = '';
            }
            if ($experiencia->activa) {
                $activa = 'checked';
            } else {
                $activa = '';
            }

            // Para las fechas, convierto los valores en un array
            // y éste en un string para pasar al formulario
            $las_fechas = [];
            if ($experiencia->exp_fecha != null) {
                foreach ($experiencia->exp_fecha as $una_fecha) {
                    $las_fechas[] = $una_fecha->fecha;
                }

                $las_fechas = json_encode($las_fechas);
            }

            $la_imagen = $experiencia->imagen->first()
                ? asset('storage/' . $experiencia->imagen->first()->ruta)
                : asset('storage/images/no-image.jpg');

            $duracion = $experiencia->duracion;
            $precio_adulto = $experiencia->precio_adulto;
            $precio_nino = $experiencia->precio_nino;
        } else {
            $titulo = __('labels.new_experience');
            $action = route('experience.store');
            $boton = __('buttons.add_experience');
            $nombre = '';
            $la_ciudad = '';
            $el_pais = '';
            $descripcion = '';
            $vip = '';
            $activa = 'checked';
            $las_fechas = '[]';
            $la_imagen = asset('storage/images/no-image.jpg');
            $duracion = '1';
            $precio_adulto = '200';
            $precio_nino = '200';
        }
    @endphp

    {{-- Formulario añadiendo las variables creadas --}}
    <div class="content form-experience">
        @component('components.row-profile')
            @slot('menuTitulo', $titulo)
        @endcomponent
        <div class="modify-exp-content">
            <form id="form" action="{{ $action }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Nombre --}}
                <label for="">{{ __('labels.name') }}</label>
                <input type="text" name="nombre" value="{{ $nombre }}">
                @error('nombre')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                {{-- Ciudad --}}
                <label for="">{{ __('labels.city') }}</label>
                <input type="text" name="ciudad" value="{{ $la_ciudad }}">
                @error('ciudad')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                {{-- Pais --}}
                <label for="pais">{{ __('labels.select_country') }}</label>
                <select id="pais" name="pais_id" required>
                    <option value="">{{ __('labels.select_country') }}</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}" @if ($pais->pais == $el_pais) selected @endif>
                            {{ $pais->pais }}</option>
                    @endforeach
                </select>
                {{-- Descripcion --}}
                <label for="">{{ __('labels.description') }}</label>
                <textarea name="descripcion" rows="5">{{ $descripcion }}</textarea>
                @error('descripcion')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                {{-- Imagen --}}
                <div class="experience-image">
                    <label for="image" class="btn-standard">Seleccionar imagen</label>
                    @error('image')
                        <p class="error-message">{{ $message }}</p>
                    @enderror

                    <input type="file" name="image" id="image" accept="image/*" required>
                </div>
                <div class="image-preview-container">
                    <!-- Contenedor para la previsualización -->
                    <img id="image-preview" src="{{ $la_imagen }}" alt="experience">
                </div>
                {{-- Fechas --}}

                <div>
                    <input class="btn-standard" type="text" id="fechaInput" value="Seleccionar fecha" readonly>
                </div>
                <ul id="listaFechas"></ul>
                <!-- Campo oculto para enviar las fechas al backend -->
                <input type="hidden" name="fechas[]" id="fechasHidden" value="{{ $las_fechas }}" required>
                @error('fechas*')
                    <p class="error-message">{{ $message }}</p>
                @enderror


                {{-- VIP --}}
                <label for="">{{ __('labels.is_vip') }}</label>
                <input type="checkbox" name="vip" {{ $vip }} />
                {{-- Activa --}}
                <label for="">{{ __('labels.active') }}</label>
                <input type="checkbox" name="activa" {{ $activa }} />
                {{-- Duración --}}
                <label for="slider">{{ __('labels.days_count') }}</label>
                <div class="slider-value"><span id="slider-value-one">{{ $duracion }}</span></div>
                <input type="range" id="slider" name="duracion" min="1" max="20" step="1"
                    value="{{ $duracion }}" oninput="updateSliderValue(this.value, 'slider-value-one')">
                {{-- Precio adulto --}}
                <label for="">{{ __('labels.price_adult') }}</label>
                <div class="slider-value"><span id="slider-value-adult">{{ $precio_adulto }}</span>€</div>
                <input type="range" id="slider" name="precio_adulto" min="200" max="10000" step="50"
                    value="{{ $precio_adulto }}" oninput="updateSliderValue(this.value, 'slider-value-adult')">
                {{-- Precio niño --}}
                <label for="">{{ __('labels.price_child') }}</label>
                <div class="slider-value"><span id="slider-value-child">{{ $precio_nino }}</span>€</div>
                <input type="range" id="slider" name="precio_nino" min="200" max="10000" step="50"
                    value="{{ $precio_nino }}" oninput="updateSliderValue(this.value, 'slider-value-child')">


                <input class="btn-standard" type="submit" value="{{ $boton }}">
            </form>

        </div>

        @if ($mode == 'modify')
            <div class="activity-modify-list">
                <p>Actividades:</p>
                <div class="activity-list">

                    @foreach ($experiencia->actividad as $actividad)
                        <div class="activity-content">
                            <p>{{ $actividad->nombre }}</p>


                            <a class="btn-standard"
                                onclick="insertModalPage('{{ route('activity.modify', $actividad->getEncryptedId()) }}', 'modal-activity-form')">
                                <p>{{ __('buttons.modify_activity') }}</p>
                            </a>
                            <form action="{{ route('activity.delete', $actividad->getEncryptedId()) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input class="btn-standard delete" type="submit"
                                    value="{{ __('buttons.delete_activity') }}">
                            </form>
                        </div>
                    @endforeach


                </div>

                <a class="btn-standard"
                    onclick="insertModalPage('{{ route('activity.form', $experiencia->getEncryptedId()) }}', 'modal-activity-form')">
                    <p>{{ __('buttons.add_activity') }}</p>

                </a>
            </div>
            {{-- Donde se inyectará la página modal --}}
            @include('_partials.page-content')
        @endif


    </div>

@endsection
