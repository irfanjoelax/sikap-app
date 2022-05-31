<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">
            <img class="navbar-brand-full app-header-logo" src="{{ asset('img/unukaltim.webp') }}" width="40px" alt="Infyom Logo">
            <span class="ml-2">
                {{ Illuminate\Support\Str::replace('_', ' ', env('APP_NAME')) }}
            </span>
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/unukaltim.webp') }}" width="40px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
            {{-- <i class="fas fa-rocket"></i>  --}}
            {{ Illuminate\Support\Str::replace('_', ' ', env('APP_NAME')) }} v.{{ env('APP_VERSION') }}
        </a>
    </div>
</aside>
