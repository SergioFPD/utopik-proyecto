<div class="row-provider-login row">
    <div class="provider-login-image">
        <div class="fundido-dos"></div>
        <img src="{{ asset('storage/images/menu_empresa.jpg') }}" alt="">

        <div class="provider-login-container">
            <div class="left">
                <p class="text-title text-small text-shadow">¡Muestra tus viajes al mundo!</p>
                <p class="text-shadow"><img src="{{asset('storage/images/check-mark.svg')}}" alt="">Recibe reservas de nuestros clientes</p>
                <p class="text-shadow"><img src="{{asset('storage/images/check-mark.svg')}}" alt="">Multiplica el éxito de tu negocio</p>
                <p class="text-shadow"><img src="{{asset('storage/images/check-mark.svg')}}" alt="">Publica experiencias VIP exclusivas</p>
                <a class="btn-standard gold-button" onclick="">
                    <p>Solicita acceso</p>
                </a>

            </div>

            <div class="right">

                <div class="form">
                    <h3>Acceso empresa</h3>
                    <form action="" method="post">
                        @csrf
                        <div class="form-inputs">
                            <input type="email" name="email" placeholder='{{ __('labels.email') }}' required>
        
                            <input type="password" name="password" placeholder='{{ __('labels.password') }}' required>
                            <div class="center-content">
                                <input class="btn-standard gold-button" type="submit" value="{{ __('buttons.access') }}">
                            </div>
                        </div>
        
                    </form>

                </div>


            </div>
            
        </div>
        @component('components.barra-alpha')
            @slot('color', 'fondo-azul-dos')
        @endcomponent
    </div>
    <div class="provider-login-cards">

    </div>
</div>
