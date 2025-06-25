<section class="flex items-start justify-center w-full min-h-screen p-4 my-4 bg-center bg-cover">
    @php
        $lang = App::getLocale();
    @endphp
    <div>
        <div class="px-4 mx-auto text-center max-w-7xl">
            <h2 class="mb-2 text-3xl font-bold text-green-700"> {{ __('menu.amazing_prices') }}</h2>
            <p class="mb-8 text-gray-600">{{ __('menu.choose_your_package') }}</p>

            <!-- Tabs for Bouquets -->
            <div class="flex flex-wrap justify-center gap-3 mb-6">
                @foreach ($bouquets as $bouquet)
                    <button wire:click="selectBouquet({{ $bouquet->id }})"
                        class="px-5 py-2 rounded-full text-sm font-medium
                        {{ $selectedBouquet === $bouquet->id ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                        {{ \App\Helpers\TranslationHelper::translate($bouquet->name ?? '', $lang) }}
                    </button>
                @endforeach
            </div>

            <!-- Packages Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                @forelse($packages as $package)
                    <div class="overflow-hidden bg-white rounded-lg shadow">
                        <img src="{{ asset('storage/' . $package->image) }}" alt=""
                            class="object-cover w-full h-40">
                        <div class="p-4 text-right">
                            <span class="text-sm font-semibold text-green-600">
                                {{ \App\Helpers\TranslationHelper::translate($package->bouquet->name ?? '', $lang) }}</span>
                            <h3 class="mt-2 text-lg font-bold">
                                {{ \App\Helpers\TranslationHelper::translate($package->name ?? '', $lang) }} </h3>
                            <p class="my-2 text-sm text-gray-500">
                                {{ \App\Helpers\TranslationHelper::translate($package->description ?? '', $lang) }}</p>
                            <div class="mb-2 text-xl font-bold text-green-700">{{ $package->base_price }}
                                {{ __('menu.rs') }}</div>
                            <a href="{{ route('booking.index', $package->id) }}"
                                class="w-full px-2 py-1 text-white transition bg-green-600 rounded hover:bg-green-700">{{ __('menu.book_now') }}
                            </a>
                            <a href="{{ route('package.show', $package->id) }}"
                                class="w-full px-2 py-1 text-white transition bg-yellow-600 rounded hover:bg-yellow-700">{{ __('menu.details') }}
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 col-span-full">{{ __('menu.no_packages') }}</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
