@extends('layouts.user')


@section('content')
    <section class="container flex flex-col items-center justify-center p-6 mx-auto">
        <div class="flex flex-col w-full max-w-5xl gap-6 p-6 mb-6 bg-white rounded-lg shadow-lg md:flex-row">
            <!-- Left Section -->
            <div class="flex flex-col items-center justify-center flex-1 p-10 sm:mb-3 ">
                <img src="{{ asset('image/bg.avif') }}" class="h-80 w-80" alt="" srcset="">
            </div>
            <!-- Right Section -->
            <div class="flex flex-col flex-1 p-4 sm:mt-3 rounded-xl">
                <h1 class="text-3xl font-bold text-center"> {{ __('menu.login') }}</h1>

                <p class="my-4 text-center text-gray-600"> {{ __('menu.enter_details') }} </p>
                <form action="{{ route('user.login') }}"  method="post" class="space-y-4">
                    @csrf

                    <div class="flex flex-col flex-1 w-full gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.email') }} <span class="text-red-500">*</span></label>
                        <input type="text" name="email" value="" placeholder="{{ __('menu.email') }}"
                            id="phone"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>
                    <!-- Password -->
                    <div class="flex flex-col w-full gap-3">
                        <label class="font-bold">{{ __('menu.password') }} <span class="text-red-500">*</span></label>
                        <input type="password" value="" name="password" placeholder="{{ __('menu.password') }} "
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>
                    <div class="flex items-center justify-between w-full mt-4">
                        <a class="p-2 text-blue-600 hover:text-blue-800" href="">{{ __('menu.forgot_password') }}</a>
                        <a class="p-2 font-bold text-green-600 hover:text-green-800"
                            href="{{ route('subscribe') }}">{{ __('menu.register') }}</a>

                    </div>
                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full p-3 px-6 py-3 my-4 text-white bg-green-600 rounded hover:bg-green-700">{{ __('menu.login') }}
                    </button>

                </form>
            </div>
        </div>
    </section>
@endsection
