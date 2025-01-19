@if ($message = Session::get('success'))
    <div id="modal-message" class="modal center show">

        <div class="modal-content">
            <h1>{{ $message }}</h1>
            <button class="close button">Aceptar</span>

        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div id="modal-message" class="modal center show">

        <div class="modal-content">
            <h1 style="color: brown">{{ $message }}</h1>
            <button class="close button">Cerrar</span>

        </div>
    </div>
@endif
