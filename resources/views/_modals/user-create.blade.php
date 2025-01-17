<div id="modal-newuser" class="modal center @if ($errors->any()) show @endif">
    <div class="modal-content">
        <h1>Nuevo usuario</h1>
        <span class="close">&times;</span>
        <form action="{{ route('admin.create.user') }}" method="post">
            @csrf
            <label for="">Nombre</label>
            <input type="text" name="nombre">
            @error('nombre')
                <p style="color:brown">{{ $message }}</p>
            @enderror
            <label for="">email</label>
            <input type="email" name="email">
            @error('email')
                <p style="color:brown">{{ $message }}</p>
            @enderror
            <label for="">Usuario</label>
            <input type="text" name="user">
            @error('user')
                <p style="color:brown">{{ $message }}</p>
            @enderror
            <label for="">Contraseña</label>
            <input type="password" name="password">
            @error('password')
                <p style="color:brown">{{ $message }}</p>
            @enderror
            <label for="">Rol</label>
            <input type="text" name="rol">
            <input type="submit" value="Registrar">
        </form>
    </div>
</div>
