<div>

    @php
        $isVip = false;
    @endphp
    <h1>{{ __('app.experience_list') }}</h1>
    @if ($experiencias == null)
        <p>{{ __('app.no_experience_list') }}</p>
    @else
        @foreach ($experiencias as $experiencia)
            @auth

                @if ($experiencia->vip && Auth::user()->vip)
                    @include('_components.experience-card-list')
                @endif
            @endauth
            @if (!$experiencia->vip)
                @include('_components.experience-card-list')
            @endif


        @endforeach

    @endif
</div>
