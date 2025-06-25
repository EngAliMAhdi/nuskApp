@extends('layouts.user')
@section('content')
    <section class="flex items-center justify-center w-full min-h-screen p-4 mb-4 bg-center bg-cover"
        style="background-image: url('{{ asset('image/bg2.jpg') }}');">
        <div class="grid w-full max-w-6xl grid-cols-1 gap-8 p-8 rounded-lg shadow-lg bg-opacity-90 md:grid-cols-2">

            {{-- Form --}}
            <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="{{ __('menu.name') }}" required
                    class="w-full p-1 border rounded">
                <input type="email" name="email" placeholder="{{ __('menu.email') }} " required
                    class="w-full p-1 border rounded">
                <input type="text" name="phone" placeholder="{{ __('menu.whatsapp_number') }}" required
                    class="w-full p-1 border rounded">
                <textarea name="message" rows="4" placeholder="{{ __('menu.your_message_with_service') }}" required
                    class="w-full p-1 border rounded"></textarea>
                <button type="submit"
                    class="w-full py-2 text-white transition bg-green-600 rounded hover:bg-green-700">{{ __('menu.send_now') }}
                </button>
            </form>

            {{-- Contact Info --}}
            <div class="flex flex-col justify-center text-right">
                <h2 class="mb-4 text-2xl font-bold text-white md:text-3xl">{{ __('menu.contact_us_better_info') }}</h2>

                <div class="flex items-center mb-4 text-white">
                    <i class="ml-2 text-xl text-green-600 fas fa-phone-alt"></i>
                    <span dir="ltr">{{ $data->phone ?? '+966568623333' }}</span>
                </div>

                <div class="flex items-center text-white">
                    <i class="ml-2 text-xl text-green-600 fas fa-map-marker-alt"></i>
                    <span>{{ __('menu.saudi_arabia') }}</span>
                </div>
            </div>
        </div>
    </section>
@endsection
