@extends('layouts.user')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
@endsection
@section('content')
    <section id="main" class="container flex flex-col items-center justify-center p-6 mx-auto">
        <div
            class="flex flex-row-reverse flex-col w-full max-w-5xl gap-6 p-6 mb-6 bg-white rounded-lg shadow-lg md:flex-row">

            <div class="flex flex-col items-center justify-center flex-1 p-3 sm:mb-3 ">
                <img src="{{ asset('image/bg.avif') }}" class="w-full" alt="" srcset="">
            </div>
            <!-- Type Buttons -->
            <div class="flex flex-col flex-1 p-4 sm:mt-3 rounded-xl">
                <h1 class="mb-2 text-3xl font-bold">{{ __('menu.welcome') }}</h1>

                <p class="mb-6 text-green-600">{{ __('menu.choose_account_type') }}</p>

                <div class="flex gap-4 mb-6">
                    <button id="individualBtn" class="p-6 px-8 text-white bg-green-600 rounded"
                        onclick="selectType('individual')">{{ __('menu.individual') }}</button>
                    <button id="companyBtn" class="p-6 px-8 text-white bg-green-600 rounded"
                        onclick="selectType('company')">{{ __('menu.company') }}</button>
                </div>

                <button onclick="showForm()"
                    class="px-8 py-2 text-white bg-green-600 rounded ">{{ __('menu.next') }}</button>

                <p class="mb-4 text-sm text-gray-700">
                    {{ __('menu.already_have_account') }}
                    <a href="{{ route('login') }}" class="font-bold text-green-700">
                        {{ __('menu.login') }}
                    </a>
                </p>

            </div>
    </section>



    <section id="individualForm" class="container flex flex-col items-center justify-center hidden p-6 mx-auto">
        <div
            class="flex flex-row-reverse flex-col w-full max-w-5xl gap-6 p-6 mb-6 bg-white rounded-lg shadow-lg md:flex-row">
            <div class="flex flex-col items-center justify-center flex-1 p-3 sm:mb-3 ">
                <img src="{{ asset('image/bg.avif') }}" class="w-full" alt="" srcset="">
            </div>
            <div class="flex flex-col flex-1 p-4 sm:mt-3 rounded-xl ">
                <h1 class="text-2xl font-bold text-center text-green-600 sm:text-lg"> {{ __('menu.create_account') }} </h1>

                <form action="{{ route('account.store') }}" class="" method="post" class="space-y-4">
                    @csrf
                    <div class="flex flex-col flex-1 w-full gap-3 mb-4">
                        <label class="font-bold"> {{ __('menu.username') }} <span class="text-red-500">*</span></label>
                        <input type="text" name="username" value="" placeholder="" id="username"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>
                    <div class="flex flex-col flex-1 w-full gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.email') }} <span class="text-red-500">*</span></label>
                        <input type="text" name="email" value="" placeholder="" id="email"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>
                    <div class="flex flex-col flex-1 w-full gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.phone') }} <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" id="phone"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                        @error('phone')
                            <small id="helpId" class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-3 mb-4">
                        <label class="font-bold"> {{ __('menu.password') }} <span class="text-red-500">*</span></label>
                        <input type="password" value="" name="password" placeholder="كلمة المرور"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>
                    <div class="flex flex-col w-full gap-3 mb-4">
                        <label class="font-bold"> {{ __('menu.confirm_password') }} <span
                                class="text-red-500">*</span></label>
                        <input type="password" value="" name="password_confirmation" placeholder="كلمة المرور"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>
                    <div class="flex items-start gap-2 mb-4">
                        <input type="checkbox" checked required
                            class="mt-1.5 w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500" required />

                        <p class="text-sm leading-6 text-gray-700">
                            {{ __('menu.agree_to') }}
                            <a href="{{ route('privacy.index') }}"
                                class="text-green-600 underline hover:text-green-700">{{ __('menu.privacy_policy') }}</a>
                            {{ __('menu.and') }}
                            <a href="{{ route('term.index') }}"
                                class="text-green-600 underline hover:text-green-700">{{ __('menu.terms_of_service') }}</a>
                        </p>
                    </div>

                    <button type="submit"
                        class="w-full px-6 py-3 my-4 font-bold text-white bg-green-600 rounded hover:bg-green-700">
                        {{ __('menu.register') }}
                    </button>

                </form>
            </div>
        </div>
    </section>

    <section id="companyForm" class="container flex flex-col items-center justify-center hidden p-6 mx-auto">
        <div
            class="flex flex-row-reverse flex-col w-full max-w-5xl gap-6 p-6 mb-6 bg-white rounded-lg shadow-lg md:flex-row">
            <div class="flex flex-col items-center justify-center flex-1 p-3 sm:mb-3 ">
                <img src="{{ asset('image/bg.avif') }}" class="w-full" alt="" srcset="">
            </div>
            <div class="flex flex-col flex-1 p-4 sm:mt-3 rounded-xl ">
                <h1 class="text-2xl font-bold text-center text-green-600 sm:text-lg"> {{ __('menu.create_account') }}</h1>

                <form action="{{ route('account.store1') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf

                    <div class="flex flex-col gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.company_name') }} <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder=""
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>

                    <div class="flex flex-col gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.email') }} <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder=""
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>

                    <div class="flex flex-col flex-1 w-full gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.phone') }} <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" id="phone1"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                        @error('phone')
                            <small id="helpId" class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.password') }} <span class="text-red-500">*</span></label>
                        <input type="password" name="password"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>

                    <div class="flex flex-col gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.confirm_password') }} <span
                                class="text-red-500">*</span></label>
                        <input type="password" name="password_confirmation"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>

                    <div class="flex flex-col gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.city') }} <span class="text-red-500">*</span></label>
                        <input type="text" name="city" value="{{ old('city') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>

                    <div class="flex flex-col gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.commercial_register') }} <span
                                class="text-red-500">*</span></label>
                        <input type="file" name="registration_number"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>

                    <div class="flex flex-col gap-3 mb-4">
                        <label class="font-bold">{{ __('menu.license_number') }} <span
                                class="text-red-500">*</span></label>
                        <input type="file" name="license_number"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            required />
                    </div>
                    <div class=""></div>
                    <div class="flex items-start gap-2 mb-4">
                        <input type="checkbox" checked required
                            class="mt-1.5 w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500" required />

                        <p class="text-sm leading-6 text-gray-700">
                            {{ __('menu.agree_to') }}
                            <a href="{{ route('privacy.index') }}"
                                class="text-green-600 underline hover:text-green-700">{{ __('menu.privacy_policy') }}</a>
                            {{ __('menu.and') }}
                            <a href="{{ route('term.index') }}"
                                class="text-green-600 underline hover:text-green-700">{{ __('menu.terms_of_service') }}</a>
                        </p>
                    </div>
                    <button type="submit"
                        class="w-full px-6 py-3 font-bold text-white bg-green-600 rounded hover:bg-green-700">
                        {{ __('menu.register') }}
                    </button>
                </form>

            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, {
                initialCountry: "auto",
                geoIpLookup: function(success, failure) {
                    fetch("https://ipapi.co/json")
                        .then(response => response.json())
                        .then(data => success(data.country_code))
                        .catch(() => success("US"));
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });

            document.querySelector("form").addEventListener("submit", function() {
                var hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "phone_full";
                hiddenInput.value = iti.getNumber();
                this.appendChild(hiddenInput);
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#phone1");
            var iti = window.intlTelInput(input, {
                initialCountry: "auto",
                geoIpLookup: function(success, failure) {
                    fetch("https://ipapi.co/json")
                        .then(response => response.json())
                        .then(data => success(data.country_code))
                        .catch(() => success("US"));
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });

            document.querySelector("form").addEventListener("submit", function() {
                var hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "phone_full";
                hiddenInput.value = iti.getNumber();
                this.appendChild(hiddenInput);
            });
        });

        let selectedType = null;

        function selectType(type) {
            selectedType = type;

            // Reset all buttons to default
            document.getElementById('individualBtn').classList.remove('bg-yellow-600', 'opacity-90');
            document.getElementById('individualBtn').classList.add('bg-green-600');

            document.getElementById('companyBtn').classList.remove('bg-yellow-600', 'opacity-90');
            document.getElementById('companyBtn').classList.add('bg-green-600');

            // Highlight selected
            if (type === 'individual') {
                document.getElementById('individualBtn').classList.add('bg-yellow-600', );
                document.getElementById('individualBtn').classList.remove('bg-green-600');
                document.getElementById('companyBtn').classList.add('opacity-90');
            } else {
                document.getElementById('companyBtn').classList.add('bg-yellow-600');
                document.getElementById('companyBtn').classList.remove('bg-green-600');
                document.getElementById('individualBtn').classList.add('opacity-90');
            }
        }

        function showForm() {
            if (selectedType === 'individual') {
                document.getElementById('main').classList.add('hidden');
                document.getElementById('individualForm').classList.remove('hidden');
                document.getElementById('companyForm').classList.add('hidden');
            } else if (selectedType === 'company') {
                document.getElementById('main').classList.add('hidden');
                document.getElementById('companyForm').classList.remove('hidden');
                document.getElementById('individualForm').classList.add('hidden');
            } else {
                alert("الرجاء اختيار نوع الحساب أولاً.");
            }
        }
    </script>
@endsection
