<div class="modal-login-row">
    <p>{{ __('buttons.login') }}</p>
    <div class="modal login">
        <div class="login-content">
            <h3>{{__('labels.hello')}}</h3>
            <form action="{{ route('login') }}" method="post">
                @csrf

                <input type="email" name="email" placeholder='{{ __('labels.email') }}'>
                <br>
                <input type="password" name="password" placeholder='{{ __('labels.password') }}'>
                <br><br>
                <input class="btn-standard" type="submit" value="{{ __('buttons.access') }}">
            </form>
        </div>
    </div>
</div>
