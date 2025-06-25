<footer class="py-10 text-white bg-green-700">
    <div class="container grid grid-cols-1 gap-8 px-4 mx-auto md:grid-cols-2 lg:grid-cols-4">

        <!-- الاستفسارات -->
        <div>
            <h3 class="mb-4 text-lg font-bold">{{ __('menu.inquiries') }} </h3>

            <form class="space-y-2" method="POST" action="{{ route('inquiry.store') }}">
                @csrf
                <input type="text" placeholder="{{ __('menu.name') }} "
                    class="w-full px-3 py-2 text-black bg-white rounded focus:outline-none" />
                <input type="text" placeholder="{{ __('menu.phone') }} "
                    class="w-full px-3 py-2 text-black bg-white rounded focus:outline-none" />
                <textarea placeholder="{{ __('menu.message') }}"
                    class="w-full px-3 py-2 text-black bg-white rounded focus:outline-none"></textarea>
                <button type="submit"
                    class="px-4 py-2 text-green-700 bg-white rounded hover:bg-gray-100">{{ __('menu.send') }} </button>
            </form>
        </div>
        @php
            use App\Models\SocialLink;
            $links = SocialLink::select('*')->first();
        @endphp
        <!-- الأقسام -->
        <div>
            <h3 class="mb-4 text-lg font-bold">{{ __('menu.categories') }} </h3>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:underline">{{ __('menu.home') }} </a></li>
                <li><a href="{{ route('package.index') }}" class="hover:underline">{{ __('menu.packages') }} </a></li>
                <li><a href="{{ route('about') }}" class="hover:underline">{{ __('menu.about') }} </a></li>
                <li><a href="{{ route('contact') }}" class="hover:underline">{{ __('menu.contact_us') }} </a></li>
                <li><a href="{{ route('privacy.index') }}" class="hover:underline">{{ __('menu.privacy_policy') }}
                    </a></li>
                <li><a href="{{ route('term.index') }}" class="hover:underline">{{ __('menu.terms_of_service') }} </a>
                </li>
            </ul>
        </div>

        <!-- مواقع التواصل الاجتماعي -->
        <div>
            <h3 class="mb-4 text-lg font-bold">{{ __('menu.social_media') }} </h3>
            <div class="flex justify-center space-x-4 rtl:space-x-reverse">
                <a href="{{ $links->facebook }}"><i class="text-2xl text-white fab fa-facebook"></i></a>
                <a href="{{ $links->x }}"><i class="text-2xl text-white fab fa-x-twitter"></i></a>
                <a href="{{ $links->whatsapp }}"><i class="text-2xl text-white fab fa-whatsapp"></i></a>
                <a href="{{ $links->instagram }}"><i class="text-2xl text-white fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- للتواصل -->
        <div>
            <h3 class="mb-4 text-lg font-bold">{{ __('menu.contact') }} </h3>
            <p class="mb-2"><i class="mr-2 fas fa-phone"></i> <span dir="ltr">{{ $links->phone }}</span></p>
            <p><i class="mr-2 fas fa-envelope"></i> {{ $links->email }}</p>
        </div>
    </div>

    <div class="pt-4 mt-8 text-center border-t border-white">
        {{ __('menu.copyright') }}
    </div>
</footer>
