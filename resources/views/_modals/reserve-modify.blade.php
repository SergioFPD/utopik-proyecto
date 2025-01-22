<div id="modal-reserve-data" class="modal center">
    <div class="modal-content">
        <p id="nombre"></p>
        <span class="close">&times;</span>
        <form id="editForm" method="post">
            @method('PUT')
            @csrf
            <label for="">{{__('labels.estate')}}</label>
            <select id="bloqueado" name="bloqueado">
                <option value="1">{{__('labels.blocked')}}</option>
                <option value="0">{{__('labels.active')}}</option>
            </select>
            <label for="">Rol</label>
            <select id="rol" name="rol">
                <option value="cliente">{{__('labels.client')}}</option>
                <option value="admin">{{__('labels.admin')}}</option>
            </select>
            <input type="submit" value="Modificar">
        </form>
        <form id="delete" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Eliminar">
        </form>
    </div>
</div>
