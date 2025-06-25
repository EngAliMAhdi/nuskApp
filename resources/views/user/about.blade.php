@extends('layouts.user')
@section('content')
    <section class="flex items-center justify-center w-full min-h-screen px-4 mb-4 bg-center bg-cover">
        <div class="container max-w-xl p-4 mx-auto">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800">{{ __('menu.about') }} </h2>
            </div>

            <div class="space-y-4">

                @foreach ($data as $faq)
                    <div class="bg-white rounded-lg shadow-md">
                        <button
                            class="flex items-center justify-between w-full px-6 py-4 text-lg font-bold text-white bg-green-600 rounded-t-lg hover:text-gray-800"
                            onclick="toggleAccordion({{ $loop->index }})">
                            {{ App::getLocale() == 'ar' ? $faq['question'] : $faq['question_en'] }}
                            <span id="icon-{{ $loop->index }}" class="text-2xl font-bold transition-transform">+</span>
                        </button>
                        <div id="answer-{{ $loop->index }}" class="hidden p-6 text-gray-700">
                            {{ App::getLocale() == 'ar' ? $faq['answer'] : $faq['answer_en'] }}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function toggleAccordion(id) {
            const answer = document.getElementById(`answer-${id}`);
            const icon = document.getElementById(`icon-${id}`);

            if (answer.classList.contains("hidden")) {
                answer.classList.remove("hidden");
                icon.textContent = "-";
            } else {
                answer.classList.add("hidden");
                icon.textContent = "+";
            }
        }
    </script>
@endsection
