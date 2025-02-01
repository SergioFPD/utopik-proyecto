@php
    // Declaro variables del formulario para cada caso: Crear/Modificar
    if ($mode == 'modify') {
        $titulo = __('labels.modify_activity');
        $experiencia_id ='';
        $action = route('activity.update', $actividad->getEncryptedId());
        $boton = __('buttons.update_activity');
        $nombre = $actividad->nombre;
        $descripcion =$actividad->descripcion;
        $dia = $actividad->dia;
    } else {
        $titulo = __('labels.new_activity');
        $experiencia_id = $experiencia->getEncryptedId();
        $action = route('activity.store');
        $boton = __('buttons.save_activity');
        $nombre = '';
        $descripcion = '';
        $dia = '1';
    }

@endphp

<div id="modal-activity-form" class="modal center @if ($errors->all() && $errors->has('modal-new-activity')) show @endif">
    <div class="modal-content">
        <p id="nombre">{{$titulo}}</p>
        <span class="close">&times;</span>
        <form action="{{$action}}" method="post">
            @csrf
            <input type="hidden" value="{{ $experiencia_id}}" name="experience_id">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{ $nombre }}">
            @error('nombre')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">Descripción</label>
            <textarea name="descripcion" rows="5">{{ $descripcion }}</textarea>
            @error('descripcion')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="slider">Día</label>
            <div class="slider-value">Cantidad: <span id="slider-value-days">{{ $dia }}</span></div>
            <input type="range" id="slider" name="dia" min="1" max="20" step="1"
                value="{{ $dia }}" oninput="updateSliderValue(this.value, 'slider-value-days')">

            <input class="btn-standard" type="submit" value="{{$boton}}">
        </form>

    </div>
</div>
