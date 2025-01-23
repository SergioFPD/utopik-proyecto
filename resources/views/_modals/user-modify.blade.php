<div id="modal-userdata" class="modal center">
    <div class="modal-content">
        <p id="nombre">nombre</p>
        <span class="close">&times;</span>
        <form id="editForm" method="post">
            @method('PUT')
            @csrf
            <label for="">Estado</label>
            <select id="bloqueado" name="bloqueado">
                <option value="1">Bloqueado</option>
                <option value="0">Activado</option>
            </select>
            <label for="">Rol</label>
            <select id="rol" name="rol">
                <option value="cliente">Cliente</option>
                <option value="admin">Administrador</option>
            </select>
            <input class="btn-standard" type="submit" value="{{ __('buttons.modify') }}">
        </form>
        <form id="delete" method="post">
            @method('DELETE')
            @csrf
            <input class="btn-standard" type="submit" value="{{ __('buttons.delete') }}">
        </form>
    </div>
</div>
