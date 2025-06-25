@extends('layouts.user')
@section('css')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
@section('content')
    <div class="max-w-3xl p-6 mx-auto bg-white rounded-md shadow-md">
        <h2 class="my-4 text-2xl font-bold text-center">{{ $data['name'] }}</h2>


        <img src="{{ $data['image'] }}" alt="{{ $data['name'] }}" class="w-1/2 mx-auto my-4 rounded-lg">
        <p class="mb-4 text-gray-700">الوصف :
            <br>
            {{ $data['description'] }}
        </p>
        {{-- <label class="block mb-2 font-bold">{{ __('messages.sub_msg1') }}:</label> --}}
        <hr>
        <p class="my-4 text-gray-700">تفاصيل أخرى :
            <br>
            مكان التجمع:
            <br>
            {{ $data['summary']['place_departure'] }}
            <br>
            توقيت الوصول:
            <br>
            {{ $data['summary']['time_arrival'] }}
            <br>
            توقيت الإنطلاق :
            <br>
            {{ $data['summary']['time_departure'] }}
            <br>
            توقيت العودة :
            <br>
            {{ $data['summary']['time_return'] }}
            <br>
            اسم الفندق :
            <br>
            {{ $data['summary']['hotel_name'] }}
            <br>
            المسافة عن الحرم :
            <br>
            {{ $data['summary']['distance_hotel'] }}
            <br>
            نقاط التوقف:
            <br>
            {{ $data['summary']['stop_points'] }}
            <br>
            ملاحظات:
            <br>
            {{ $data['summary']['notes'] }}
        </p>
        <div x-data="{
            open: false,
            photos: @js($data['photos_hotels']),
            currentIndex: 0,
            show(index) {
                this.currentIndex = index;
                this.open = true;
                document.body.style.overflow = 'hidden';
            },
            close() {
                this.open = false;
                document.body.style.overflow = '';
            },
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.photos.length;
            },
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.photos.length) % this.photos.length;
            }
        }">
            <!-- صور مصغرة -->
            <div class="grid grid-cols-1 gap-4 my-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <template x-for="(photo, index) in photos" :key="index">
                    <div class="overflow-hidden transition duration-300 transform shadow-lg cursor-pointer rounded-xl hover:scale-105 hover:shadow-2xl"
                        @click="show(index)">
                        <img :src="photo" alt="Hotel Image" class="object-cover w-full h-60">
                    </div>
                </template>
            </div>

            <!-- Modal -->
            <div x-show="open" x-transition.opacity @click.self="close"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80" style="display: none;">
                <div class="relative bg-white rounded-xl p-4 max-w-2xl w-[90%] max-h-[90vh] flex flex-col items-center">

                    <!-- زر الإغلاق -->
                    <button @click="close"
                        class="absolute z-10 text-3xl font-bold text-black top-2 right-3 hover:text-red-600"
                        aria-label="Close">
                        &times;
                    </button>

                    <!-- الصورة -->
                    <img :src="photos[currentIndex]" class="w-full max-h-[60vh] object-contain rounded-md" alt="عرض الصورة">

                    <!-- أزرار التنقل -->
                    <div class="flex justify-between w-full px-4 mt-4">
                        <button @click="prev" class="px-4 py-2 text-white bg-green-600 rounded shadow hover:bg-yellow-600">
                            السابق
                        </button>
                        <button @click="next" class="px-4 py-2 text-white bg-green-600 rounded shadow hover:bg-yellow-600">
                            التالي
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-wrap items-center justify-between gap-4">

            <p class="text-green-600"> {{ $data['base_price'] ? $data['base_price'] . ' ر.س' : '' }}</p>
            <a href="{{ route('booking.index', $data['id']) }}"
                class="px-2 py-1 text-white transition bg-green-600 rounded hover:bg-green-700">احجز
                الآن</a>
        </div>
    </div>
@endsection
@section('script')
@endsection
