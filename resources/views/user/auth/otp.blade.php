@extends('layouts.user')
@section('css')
@endsection
@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen p-4 bg-gray-100">
        <h2 class="mb-6 text-2xl font-bold text-center text-green-700">{{ __('menu.enter_verification_code') }}
            <br>
            {{ __('menu.phone') }}: {{ $phone }}
        </h2>
        <form method="POST" action="{{ route('verify.otp') }}">
            @csrf
            <input type="hidden" name="phone" value="{{ $phone }}">

            <div class="flex justify-center gap-2">
                @for ($i = 0; $i < 6; $i++)
                    <input type="text" name="code[]" maxlength="1" class="w-10 h-12 text-center border rounded otp-input"
                        required>
                @endfor
            </div>

            <button type="submit" class="px-6 py-2 mt-4 font-bold text-white bg-green-600 rounded hover:bg-green-700">
                تحقق
            </button>
        </form>
        <p class="mt-4 text-sm text-gray-600"> {{ __('menu.did_not_receive_code') }} <a href="#"
                class="text-blue-600 hover:underline">{{ __('menu.resend') }}</a></p>
    </div>
@endsection
@section('script')
@endsection
