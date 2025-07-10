@php
    use App\Models\SocialLink;
    $links = SocialLink::select('*')->first();
@endphp
<header class="relative py-4 bg-white shadow-md">
    <div class="container flex items-center justify-between px-6 mx-auto">

        <div class="flex items-center space-x-4 rtl:space-x-reverse">
            @guest
                <a href="{{ route('login') }}"
                    class="flex items-center justify-center w-10 h-10 text-2xl text-green-700 bg-green-100 rounded-full">
                    <i class="fas fa-user"></i>
                </a>
            @else
                @if (Auth::user()->role == 'user')
                    <a href="{{ route('user.dashboard') }}"
                        class="flex items-center justify-center w-10 h-10 text-2xl text-green-700 bg-green-100 rounded-full">
                        <i class="fas fa-user"></i>
                    </a>
                @elseif(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center justify-center w-10 h-10 text-2xl text-green-700 bg-green-100 rounded-full">
                        <i class="fas fa-user-shield"></i>
                    </a>
                @elseif(Auth::user()->role == 'company')
                    <a href="{{ route('company.dashboard') }}"
                        class="flex items-center justify-center w-10 h-10 text-2xl text-green-700 bg-green-100 rounded-full">
                        <i class="fas fa-building"></i>
                    </a>
                @endif
            @endguest
        </div>

        <button id="menu-toggle"
            class="text-2xl text-green-700 transition-transform duration-300 md:hidden focus:outline-none">
            <span id="menu-icon">☰</span>
        </button>

        <nav id="menu"
            class="hidden absolute top-full left-0 w-full bg-white shadow-md md:static md:block md:w-auto md:bg-transparent md:shadow-none z-[9999]">
            <ul class="flex flex-col p-4 space-y-4 md:flex-row md:space-y-0 md:space-x-6 rtl:space-x-reverse md:p-0">
                <li><a href="{{ route('home') }}"
                        class="block text-lg font-semibold text-green-700">{{ __('menu.home') }}</a></li>
                <li><a href="{{ route('package.index') }}" class="block text-lg hover:text-green-700">
                        {{ __('menu.packages') }}</a></li>
                <li><a href="{{ route('about') }}" class="block text-lg hover:text-green-700">{{ __('menu.about') }}
                    </a></li>
                <li><a href="{{ route('contact') }}"
                        class="block text-lg hover:text-green-700">{{ __('menu.contact') }}
                    </a></li>
                <li><a href="{{ App::getLocale() == 'en' ? route('change.language', 'ar') : route('change.language', 'en') }}"
                        class="block text-lg hover:text-green-700">{{ App::getLocale() == 'en' ? 'AR' : 'EN' }} </a>
                </li>

            </ul>
        </nav>

        <a href="{{ $links->whatsapp }}"
            class="flex items-center justify-center w-10 h-10 text-2xl text-green-700 bg-green-100 rounded-full">
            <i class="fab fa-whatsapp"></i>
        </a>

    </div>
</header>
