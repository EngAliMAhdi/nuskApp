@extends('layouts.user')

@section('content')
    <section class="container px-4 py-10 mx-auto">
        <div class="max-w-4xl p-6 mx-auto space-y-6 bg-white shadow-md rounded-2xl"
            dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            <h2 class="text-2xl font-bold text-center text-gray-800">{{ __('menu.terms_title') }}</h2>

            {{-- الأقسام الأربعة --}}
            <div>
                <h3 class="mb-1 text-lg font-semibold text-gray-700">{{ __('menu.account') }}</h3>
                <ul class="list-disc {{ app()->getLocale() === 'ar' ? 'pl-5' : 'pl-5' }} text-gray-600">
                    @foreach (__('menu.account_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="mb-1 text-lg font-semibold text-gray-700">{{ __('menu.booking') }}</h3>
                <ul class="pl-5 text-gray-600 list-disc">
                    @foreach (__('menu.booking_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="mb-1 text-lg font-semibold text-gray-700">{{ __('menu.behavior') }}</h3>
                <ul class="pl-5 text-gray-600 list-disc">
                    @foreach (__('menu.behavior_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="mb-1 text-lg font-semibold text-gray-700">{{ __('menu.responsibility') }}</h3>
                <ul class="pl-5 text-gray-600 list-disc">
                    @foreach (__('menu.responsibility_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
