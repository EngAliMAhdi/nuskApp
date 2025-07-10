<div class="max-w-6xl p-6 mx-auto space-y-6">
    <h2 class="mb-4 text-2xl font-bold text-gray-800">{{ __('menu.travel_bookings') }}</h2>

    <!-- Travel Details Section -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-xl font-semibold text-gray-700">{{ __('menu.booking_information') }}</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('menu.country') }}</label>
                <input wire:model="country" type="text" placeholder="{{ __('menu.country') }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                @error('country') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('menu.city') }}</label>
                <input wire:model="city" type="text" placeholder="{{ __('menu.city') }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                @error('city') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('menu.reservation_date') }}</label>
                <input wire:model="reservation_date" type="date"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                @error('reservation_date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <!-- Transport to Mecca Section -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-xl font-semibold text-gray-700">{{ __('menu.transport_to_mecca') }}</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('menu.transport_type') }}</label>
                <select wire:model="transport_type_to_mecca" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="bari">{{ __('menu.land_transport') }}</option>
                    <option value="jawi">{{ __('menu.air_transport') }}</option>
                </select>
            </div>
            @if($transport_type_to_mecca == 'bari')
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('menu.transport_vehicle') }}</label>
                    <select wire:model="transport_id_to_mecca" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <option value="">{{ __('menu.choose') }} {{ __('menu.transport_vehicle') }}</option>
                        @foreach($transports as $transport)
                            <option value="{{ $transport->id }}">{{ $transport->name }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('menu.airplane') }}</label>
                    <select wire:model="air_transport_id_to_mecca" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <option value="">{{ __('menu.choose') }} {{ __('menu.airplane') }}</option>
                        @foreach($airTransports as $airTransport)
                            <option value="{{ $airTransport->id }}">{{ $airTransport->airplane }} - {{ $airTransport->flight_number }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>

    <!-- Transport to Madina Section -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-xl font-semibold text-gray-700">{{ __('menu.transport_to_madina') }}</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('menu.transport_type') }}</label>
                <select wire:model="transport_type_to_madina" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="bari">{{ __('menu.land_transport') }}</option>
                    <option value="jawi">{{ __('menu.air_transport') }}</option>
                </select>
            </div>
            @if($transport_type_to_madina == 'bari')
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('menu.transport_vehicle') }}</label>
                    <select wire:model="transport_id_to_madina" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <option value="">{{ __('menu.choose') }} {{ __('menu.transport_vehicle') }}</option>
                        @foreach($transports as $transport)
                            <option value="{{ $transport->id }}">{{ $transport->name }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('menu.airplane') }}</label>
                    <select wire:model="air_transport_id_to_madina" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <option value="">{{ __('menu.choose') }} {{ __('menu.airplane') }}</option>
                        @foreach($airTransports as $airTransport)
                            <option value="{{ $airTransport->id }}">{{ $airTransport->airplane }} - {{ $airTransport->flight_number }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>

    <!-- Hotels Section -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-xl font-semibold text-gray-700">{{ __('menu.hotels') }}</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('menu.mecca_hotel') }}</label>
                <select wire:model="hotel_id_mecca" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="">{{ __('menu.choose') }} {{ __('menu.mecca_hotel') }}</option>
                    @foreach($hotels->where('city', 'makaa') as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('menu.madina_hotel') }}</label>
                <select wire:model="hotel_id_madina" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="">{{ __('menu.choose') }} {{ __('menu.madina_hotel') }}</option>
                    @foreach($hotels->where('city', 'madina') as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Passengers Section -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <h3 class="mb-4 text-xl font-semibold text-gray-700">{{ __('menu.passenger_details') }}</h3>
        
        @foreach ($passengers as $index => $passenger)
            <div class="relative p-6 mb-4 bg-gray-50 border rounded-lg">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">{{ __('menu.first_name') }}</label>
                        <input wire:model="passengers.{{ $index }}.first_name" type="text"
                            placeholder="{{ __('menu.first_name') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                        @error("passengers.{$index}.first_name") <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">{{ __('menu.last_name') }}</label>
                        <input wire:model="passengers.{{ $index }}.last_name" type="text"
                            placeholder="{{ __('menu.last_name') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                        @error("passengers.{$index}.last_name") <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">{{ __('menu.dob') }}</label>
                        <input wire:model="passengers.{{ $index }}.birth_date" type="date"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                        @error("passengers.{$index}.birth_date") <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">{{ __('menu.nationality') }}</label>
                        <input wire:model="passengers.{{ $index }}.nationality" type="text"
                            placeholder="{{ __('menu.nationality') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                        @error("passengers.{$index}.nationality") <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">{{ __('menu.national_id') }}</label>
                        <input wire:model="passengers.{{ $index }}.national_id" type="text"
                            placeholder="{{ __('menu.national_id') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                        @error("passengers.{$index}.national_id") <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                </div>

                @if(count($passengers) > 1)
                    <button wire:click.prevent="removePassenger({{ $index }})"
                        class="absolute text-sm text-red-500 top-4 {{ App::getLocale() == 'ar' ? 'left-4' : 'right-4' }} hover:text-red-700">
                        {{ __('menu.remove') }}
                    </button>
                @endif
            </div>
        @endforeach

        <button wire:click.prevent="addPassenger"
            class="px-4 py-2 font-semibold text-white transition bg-blue-500 rounded-lg shadow hover:bg-blue-600">
            + {{ __('menu.add_passenger') }}
        </button>
    </div>

    <!-- Payment Section -->
    <div class="p-6 bg-white border shadow-lg rounded-xl">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <select wire:model.live="payment_method" class="block w-1/2 mt-1 border-gray-300 rounded-md input md:w-1/2">
                <option value="cash">{{ __('menu.payment_method_cash') }}</option>
                <option value="credit_card">{{ __('menu.payment_method_card') }}</option>
            </select>
            <p class="text-green-600 text-lg font-semibold">{{ $total_price ? $total_price . ' ' . __('menu.rs') : '' }}</p>
            <button wire:click="save"
                class="px-6 py-2 font-semibold text-white transition bg-green-600 rounded-lg shadow-lg hover:bg-green-700">
                {{ __('menu.confirm_booking') }}
            </button>
        </div>
    </div>
</div> 