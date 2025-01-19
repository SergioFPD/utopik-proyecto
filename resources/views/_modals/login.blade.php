<div class="modal-login-row" style="background-color: rgb(121, 199, 236)">
    <p>Conectarse</p>
    <div class="modal login" style="height: 100px">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <input type="text" name="user">
            <label for="">Contraseña</label>
            <input type="password" name="password">
            <input type="submit" value="Entrar">
        </form>
    </div>
</div>
