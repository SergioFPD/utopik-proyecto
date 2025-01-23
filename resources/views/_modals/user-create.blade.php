<div id="modal-newuser" class="modal center @if($errors->all() && $errors->has('create')) show @endif">

    <div class="modal-content">
        <h1>{{__('labels.new_user')}}</h1>
        <span class="close">&times;</span>
        <form action="{{ route('admin.create.user') }}" method="post">
            @csrf
            <label for="">{{__('labels.name')}}</label>
            <input type="text" name="nombre" required>
            @error('nombre')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">{{__('labels.email')}}</label>
            <input type="email" name="email" required>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">{{__('labels.password')}}</label>
            <input type="password" name="password" required>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <label for="">{{__('labels.role')}}</label>
            <select name="rol">
                <option value="cliente">{{__('labels.client')}}</option>
                <option value="admin">{{__('labels.admin')}}</option>
            </select>
            <input class="btn-standard" type="submit" value="{{ __('buttons.create-user') }}">
        </form>
    </div>
</div>
