<div id="modal-newuser" class="modal center @if($errors->all() && $errors->has('create')) show @endif">

    <div class="modal-content">
        <h1>Nuevo usuario</h1>
        <span class="close">&times;</span>
        <form action="{{ route('admin.create.user') }}" method="post">
            @csrf
            <label for="">Nombre</label>
            <input type="text" name="nombre">
            @error('nombre')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">email</label>
            <input type="email" name="email">
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">Usuario</label>
            <input type="text" name="user">
            @error('user')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">Contraseña</label>
            <input type="password" name="password">
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">Rol</label>
            <select name="rol">
                <option value="cliente">Cliente</option>
                <option value="admin">Administrador</option>
            </select>
            <input type="submit" value="Registrar">
        </form>
    </div>
</div>
