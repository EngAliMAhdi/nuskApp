@extends('layouts.user')

@section('content')
    <section class="container px-4 py-10 mx-auto">
        <div class="max-w-4xl p-6 mx-auto space-y-6 bg-white shadow-md rounded-2xl"
            dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            <h2 class="text-2xl font-bold text-center text-gray-800">{{ __('menu.privacy_title') }}</h2>

            {{-- Section 1 --}}
            <div>
                <h3 class="mb-1 text-lg font-semibold text-gray-700">{{ __('menu.privacy_1_title') }}</h3>
                <ul class="pl-5 text-gray-600 list-disc">
                    @foreach (__('menu.privacy_1_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- Section 2 --}}
            <div>
                <h3 class="mb-1 text-lg font-semibold text-gray-700">{{ __('menu.privacy_2_title') }}</h3>
                <ul class="pl-5 text-gray-600 list-disc">
                    @foreach (__('menu.privacy_2_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- Section 3 --}}
            <div>
                <h3 class="mb-1 text-lg font-semibold text-gray-700">{{ __('menu.privacy_3_title') }}</h3>
                <ul class="pl-5 text-gray-600 list-disc">
                    @foreach (__('menu.privacy_3_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- Section 4 --}}
            <div>
                <h3 class="mb-1 text-lg font-semibold text-gray-700">{{ __('menu.privacy_4_title') }}</h3>
                <ul class="pl-5 text-gray-600 list-disc">
                    @foreach (__('menu.privacy_4_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
