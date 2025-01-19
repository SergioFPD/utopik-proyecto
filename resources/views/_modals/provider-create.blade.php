<div id="modal-provider" class="modal center">
    <div class="modal-content">
        <p id="nombre">Nuevo proveedor</p>
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

            <input type="hidden" name="rol" value="proveedor">
            <input type="submit" value="Crear proveedor">
        </form>
 
    </div>
</div>
