<div id="modal-register" class="modal center @if($errors->all() && $errors->has('register')) show @endif">

    <div class="modal-content">
        <h1>Formulario de registro</h1>
        <span class="close">&times;</span>
        <form action="{{ route('register.user') }}" method="post">
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
            <input type="submit" value="Registrar">
        </form>
    </div>
</div>
