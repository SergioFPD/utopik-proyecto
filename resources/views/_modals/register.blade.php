<div id="modal-register" class="modal center @if($errors->all() && $errors->has('modal-register')) show @endif">

    <div class="modal-content">
        <h1>{{ __('labels.form_register') }}</h1>
        <span class="close">&times;</span>
        <form action="{{ route('register.user') }}" method="post">
            @csrf
            <label for="">{{ __('labels.name') }}</label>
            <input type="text" name="nombre">
            @error('nombre')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">{{ __('labels.email') }}</label>
            <input type="email" name="email">
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">{{ __('labels.password') }}</label>
            <input type="password" name="password">
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <input class="btn-standard" type="submit" value="{{ __('buttons.register') }}">
        </form>
    </div>
</div>
