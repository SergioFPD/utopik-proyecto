<div class="modal-login-row" style="background-color: rgb(121, 199, 236)">
    <p>{{ __('buttons.login') }}</p>
    <div class="modal login" style="height: 100px">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="">{{ __('labels.email') }}</label>
            <input type="email" name="email">
            <label for="">{{ __('labels.password') }}</label>
            <input type="password" name="password">
            <input type="submit" value="{{ __('buttons.access') }}">
        </form>
    </div>
</div>
