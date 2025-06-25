<div class="max-w-4xl p-6 mx-auto space-y-6">
    <h2 class="mb-4 text-2xl font-bold text-gray-800">بيانات المعتمرين</h2>

    @foreach ($people as $index => $person)
        <div class="relative p-6 bg-white border shadow-lg rounded-xl">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('menu.first_name') }}</label>
                    <input wire:model="people.{{ $index }}.first_name" type="text"
                        placeholder="{{ __('menu.first_name') }} "
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('menu.last_name') }} </label>
                    <input wire:model="people.{{ $index }}.last_name" type="text"
                        placeholder="{{ __('menu.last_name') }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('menu.dob') }} </label>
                    <input wire:model="people.{{ $index }}.birth_date" type="date"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('menu.nationality') }}</label>
                    <input wire:model="people.{{ $index }}.nationality" type="text"
                        placeholder="{{ __('menu.nationality') }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> {{ __('menu.national_id') }}</label>
                    <input wire:model="people.{{ $index }}.national_id" type="text"
                        placeholder="{{ __('menu.national_id') }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                </div>
            </div>

            <button wire:click.prevent="removePerson({{ $index }})"
                class="absolute text-sm text-red-500 top-4 {{ App::getLocale()=='ar'? 'left-4':'right-4' }} hover:text-red-700">{{ __('menu.remove') }}</button>
        </div>
    @endforeach
    <button wire:click.prevent="addPerson"
        class="px-4 py-2 font-semibold text-white transition bg-blue-500 rounded-lg shadow hover:bg-blue-600">
        + {{ __('menu.add_person') }}
    </button>


    <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="">
            <select wire:model.live="payment_method"
                class="block w-full mt-1 border-gray-300 rounded-md input md:w-1/2">
                <option value="cash"> {{ __('menu.payment_method_cash') }}</option>
                <option value="credit_card"> {{ __('menu.payment_method_card') }}</option>
            </select>
        </div>
        <p class="text-green-600"> {{ $total ? $total . ' ر.س' : '' }}</p>
        <button wire:click="save"
            class="px-6 py-2 font-semibold text-white transition bg-green-600 rounded-lg shadow-lg hover:bg-green-700">
            {{ __('menu.confirm_booking') }}
        </button>
    </div>
</div>
