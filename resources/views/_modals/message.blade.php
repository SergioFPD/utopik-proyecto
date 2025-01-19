@if ($message = Session::get('success'))
    <div id="modal-message" class="modal center show">

        <div class="modal-content">
            <h1>{{ $message }}</h1>
            <button class="close button">Aceptar</span>

        </div>
    </div>
@endif
