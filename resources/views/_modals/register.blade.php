<div id="modal-register" class="modal center">
    <div class="modal-content">
        <h1>Formulario de registro</h1>
        <span class="close">&times;</span>
        <form action="" method="post">
            @csrf
            <label for="">Nombre</label>
            <input type="text" name="nombre">
            <label for="">email</label>
            <input type="email" name="email">
            <label for="">Usuario</label>
            <input type="text" name="user">
            <label for="">Contraseña</label>
            <input type="password" name="password">
            <input type="submit" value="Registrar">
        </form>
    </div>
</div>
