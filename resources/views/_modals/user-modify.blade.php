<div id="modal-userdata" class="modal center">
    <div class="modal-content">
        <h1>Modificar usuario</h1>
        <span class="close">&times;</span>
        <form id="editForm" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" id="userId" name="id">
            <label for="">Nombre</label>
            <input type="text" id="nombre" name="nombre" disabled >
            <label for="">Bloqueado</label>
            <input type="text" id="bloqueado" name="bloqueado">
            <label for="">Rol</label>
            <input type="text" id="rol" name="rol">
            <input type="submit" value="Modificar">
        </form>
    </div>
</div>
