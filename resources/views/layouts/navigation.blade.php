<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('keywords.dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                        {{ __('keywords.products') }}
                    </x-nav-link>
                </div>
                {{-- Add localizaion switcher --}}
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                @php
                 $route = Illuminate\Support\Facades\Route::currentRouteName();
                 $lang =request()->segment(1) == 'ar' ? 'en' : 'ar';
                @endphp
                    <x-nav-link href="{{ route($route, ['locale'=>$lang]) }}">
                        {{-- {{ request()->segment(1) == 'ar' ? 'EN' : 'AR' }} --}}
                        {{-- {{ strtoupper($lang) }} --}}
                    {{-- </x-nav-link>  --}}
                {{-- </div> --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                @php
                 $route = Illuminate\Support\Facades\Route::currentRouteName();
                 $lang =request()->segment(1) == 'ar' ? 'en' : 'ar';
                @endphp
                    <x-nav-link href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($lang) }}">
                        {{-- {{ request()->segment(1) == 'ar' ? 'EN' : 'AR' }} --}}
                        {{ strtoupper($lang) }}
                    </x-nav-link> 
                </div>
            </div>

        </div>
    </div>
</nav>
