<div class="modal-user-menu">
    @if (Auth::user()->vip)
        <p class="border-vip">VIP</p>
    @endif
    <div class="border-line">
        <p>{{ __('labels.hello') }} {{ Auth::user()->nombre }}</p>
        <img src="{{ asset('storage/images/menu-down.svg') }}" alt="">
    </div>
    <div class="modal user-menu">
        <div class="user-menu-content">

            <a class="menu-user-item" href="{{ route('client.profile', 'user_data') }}">
                <p>{{__('labels.my_profile')}}</p>
            </a>
            <a class="menu-user-item" href="{{ route('client.profile', 'reserves') }}">
                <p>{{__('labels.my_bookings')}}</p>
            </a>
            <a class="menu-user-item" href="{{ route('logout') }}">
                <p>{{__('labels.logout')}}</p>
            </a>

        </div>
    </div>
</div>
