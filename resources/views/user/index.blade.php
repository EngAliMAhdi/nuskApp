@extends('layouts.user')
@php
    $lang = App::getLocale();
@endphp
@section('content')
    <section class="bg-cover bg-center h-[500px] relative" style="background-image: url('{{ asset('image/bg.avif') }}')">
        <div class="absolute inset-0 flex flex-col items-start justify-center px-10 text-white bg-black bg-opacity-50"
            dir="rtl">
            <h1 class="mb-4 text-4xl font-bold">{{ __('menu.start_spiritual_journey') }} </h1>
            <p class="mb-6">{{ __('menu.start_journey_description') }} </p>
            <a href="#"
                class="px-6 py-3 text-white bg-green-600 rounded hover:bg-green-700">{{ __('menu.start_journey_now') }} </a>
        </div>
    </section>
    <section class="flex flex-col items-center justify-center px-4 py-10 bg-gray-50">
        <div class="flex flex-col items-stretch justify-center w-full max-w-6xl gap-6 md:flex-row">

            <!-- Box 1: نبذة عن الشركة -->
            <div
                class="flex flex-col w-full overflow-hidden text-white bg-green-600 shadow-lg md:flex-row rounded-xl md:w-1/2">
                <div class="flex items-center justify-center p-6 md:w-1/3">
                    <img src="{{ asset('image/kaaba.png') }}" alt="صورة الكعبة" class="object-contain w-24 h-24">
                </div>
                <div class="p-6 md:w-2/3">
                    <h2 class="mb-2 text-lg font-bold">{{ __('menu.about_company') }} </h2>
                    <p class="text-sm leading-relaxed">
                        {{ __('menu.company_description') }}
                    </p>
                </div>
            </div>

            <div
                class="flex flex-col justify-center w-full p-6 text-center text-white bg-yellow-800 shadow-lg rounded-xl md:w-1/2">
                <div class="flex flex-col items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-14 h-14" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 14c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zM2 20c0-2.67 5.33-4 10-4s10 1.33 10 4v2H2v-2z" />
                    </svg>
                    <h3 class="mb-2 text-lg font-bold">{{ __('menu.our_community') }} </h3>
                    <div class="flex justify-center gap-10 text-sm">
                        <div>
                            <p class="text-xl font-bold">+10,000</p>
                            <p>{{ __('menu.pilgrims_served') }} </p>
                        </div>
                        <div>
                            <p class="text-xl font-bold">+15</p>
                            <p>{{ __('menu.years_experience') }} </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <section class="py-12 bg-gray-50">
        <div class="container px-4 mx-auto">
            <h2 class="mb-8 text-2xl font-bold text-center"> {{ __('menu.all_offers') }} </h2>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4">
                <!-- Card Example -->
                @foreach ($data as $item)
                    <div class="overflow-hidden bg-white rounded shadow">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="العرض" class="object-cover w-full h-48">
                        <div class="p-4">
                            <h3 class="mb-2 text-lg font-semibold">
                                {{ \App\Helpers\TranslationHelper::translate($item->name ?? '', $lang) }}</h3>
                            <div class="mb-2 text-xl font-bold text-green-700">{{ $item->base_price }}
                                {{ __('menu.rs') }}</div>
                            <a href="{{ route('booking.index', $item->id) }}"
                                class="w-full px-2 py-1 text-white transition bg-green-600 rounded hover:bg-green-700">{{ __('menu.book_now') }}
                            </a>
                            <a href="{{ route('package.show', $item->id) }}"
                                class="w-full px-2 py-1 text-white transition bg-yellow-600 rounded hover:bg-yellow-700">{{ __('menu.details') }}
                            </a>
                        </div>
                    </div>
                @endforeach
                <!-- كرر الكروت حسب الحاجة -->
                <!-- ... -->
            </div>
        </div>
    </section>
@endsection
