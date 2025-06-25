@extends('layouts.user')
@section('css')
@endsection
@section('content')
    <section class="py-12 bg-gray-100">
        <div class="flex flex-col max-w-6xl mx-auto overflow-hidden bg-white rounded-lg shadow-lg md:flex-row">

            <!-- Sidebar -->
            <aside class="w-full p-4 space-y-4 bg-white border-r md:w-1/4">
                <div class="mb-6 text-right">
                    <p class="text-sm text-gray-500">{{ __('menu.welcome') }} </p>
                    <h2 class="font-bold">{{ Auth::user()->username }} </h2>
                    <img src="{{ Auth::user()->account->image ?? asset('image/pro.png') }}"
                        class="w-20 h-20 mx-auto mt-2 rounded-full " alt="Avatar">
                </div>

                <nav class="space-y-2">
                    <button data-tab="profile"
                        class="w-full px-4 py-2 text-right text-white bg-green-600 rounded tab-button hover:bg-yellow-600">{{ __('menu.profile') }}
                    </button>
                    <button data-tab="orders"
                        class="w-full px-4 py-2 text-right rounded hover:text-white tab-button hover:bg-yellow-600">{{ __('menu.orders') }}</button>
                    {{-- <button data-tab="addresses"
                        class="w-full px-4 py-2 text-right rounded tab-button hover:bg-yellow-600">العناوين</button> --}}
                    <button data-tab="password"
                        class="w-full px-4 py-2 text-right rounded hover:text-white tab-button hover:bg-yellow-600">
                        {{ __('menu.change_password') }}</button>
                    <button data-tab="info"
                        class="w-full px-4 py-2 text-right rounded hover:text-white tab-button hover:bg-yellow-600">{{ __('menu.additional_info') }}
                    </button>
                    <a href="{{ route('user.logout') }}"
                        class="block w-full py-2 text-right text-red-600 rounded blopx-4 hover:text-white hover:bg-yellow-600">
                        {{ __('menu.logout') }}</a>
                </nav>
            </aside>

            <!-- Main content -->
            <div class="w-full p-6 md:w-3/4">

                <!-- الملف الشخصي -->
                <div data-content="profile" class="tab-content">
                    <h3 class="mb-4 text-xl font-bold text-green-700">{{ __('menu.edit_profile') }}</h3>
                    <form class="space-y-4" method="POST" action="{{ route('user.profile.update') }}">
                        @csrf
                        <label for="" class="pt-3"> {{ __('menu.email') }}</label>
                        <input type="email" value="{{ Auth::user()->email }}" name="email" placeholder=""
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <label for="" class="pt-3"> {{ __('menu.username') }} </label>
                        <input type="text" value="{{ Auth::user()->username }}" name="username" placeholder=""
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <label for="" class="pt-3">{{ __('menu.phone') }} </label>
                        <input type="text" value="{{ Auth::user()->phone }}" name="phone" placeholder=""
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <button type="submit"
                            class="px-6 py-2 text-white bg-green-600 rounded hover:bg-green-700">{{ __('menu.save') }}</button>
                    </form>
                </div>

                <!-- الطلبات -->
                <div data-content="orders" class="hidden tab-content">
                    <h3 class="mb-4 text-xl font-bold text-green-700">{{ __('menu.my_orders') }} </h3>
                    @if (isset($data) & !empty($data) & (count($data) > 0))
                        <table class="min-w-full my-3 overflow-auto bg-white border border-gray-300 rounded-lg shadow-md">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-center border-b">{{ __('menu.package') }} </th>
                                    <th class="px-6 py-3 text-center border-b">{{ __('menu.people_count') }} </th>
                                    <th class="px-6 py-3 text-center border-b">{{ __('menu.total_price') }} </th>
                                    <th class="px-6 py-3 text-center border-b">{{ __('menu.status') }}</th>
                                    <th class="px-6 py-3 text-center border-b"> {{ __('menu.payment_method') }}</th>
                                    <th class="px-6 py-3 text-center border-b">{{ __('menu.payment_status') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3 text-center border-b">{{ $item->package->name }}</td>
                                        <td class="px-6 py-3 text-center border-b">{{ count($item->people) }}</td>
                                        <td class="px-6 py-3 text-center border-b">{{ $item->total_price }}</td>
                                        <td class="px-6 py-3 text-center border-b">
                                            {{ $item->status == 'pending' ? __('menu.pending') : __('menu.processing') }}
                                        </td>
                                        <td class="px-6 py-3 text-center border-b">
                                            {{ $item->method_paid == 'cash' ? __('menu.cash') : __('menu.prepaid') }}</td>
                                        <td class="px-6 py-3 text-center border-b">
                                            {{ $item->payment_status == 'paid' ? __('menu.paid') : __('menu.unpaid') }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-500">{{ __('menu.no_orders') }}</p>
                    @endif

                </div>



                <!-- تغيير كلمة السر -->
                <div data-content="password" class="hidden tab-content">
                    <h3 class="mb-4 text-xl font-bold text-green-700">{{ __('menu.change_password') }} </h3>
                    <form class="space-y-4" action="{{ route('user.password.update') }}" method="post">
                        @csrf
                        <input type="password" name="current_password" placeholder="{{ __('menu.current_password') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        @error('current_password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="password" name="new_password" placeholder="{{ __('menu.new_password') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        @error('new_password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        <button
                            class="px-6 py-2 text-white bg-green-600 rounded hover:bg-green-700">{{ __('menu.update') }}</button>
                    </form>
                </div>

                <!-- معلومات إضافية -->
                <div data-content="info" class="hidden tab-content">
                    <h3 class="mb-4 text-xl font-bold text-green-700">{{ __('menu.additional_info') }} </h3>

                    <form class="space-y-2" method="POST" action="{{ route('user.account.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="relative w-20 h-20 mx-auto mb-4">
                            <img id="profileImage" src="{{ Auth::user()->account->image ?? asset('image/pro.png') }}"
                                class="object-cover w-full h-full border rounded-full">

                            <label for="imageUpload"
                                class="absolute inset-0 flex items-center justify-center transition bg-black bg-opacity-50 rounded-full cursor-pointer hover:opacity-80">
                                <i class="text-2xl text-white fas fa-upload"></i>
                            </label>

                            <input type="file" id="imageUpload" name="image" class="hidden" accept="image/*">
                        </div>

                        <div>
                            <label class="block mb-1 text-right text-gray-700">{{ __('menu.first_name') }} </label>
                            <input type="text" value="{{ Auth::user()->account->f_name ?? '' }}" name="f_name"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                required>
                        </div>

                        <div>
                            <label class="block mb-1 text-right text-gray-700">{{ __('menu.last_name') }} </label>
                            <input type="text" value="{{ Auth::user()->account->l_name ?? '' }}" name="l_name"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                required>
                        </div>

                        <div>
                            <label class="block mb-1 text-right text-gray-700">{{ __('menu.gender') }}</label>
                            <select name="gender"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                required>
                                <option value="">{{ __('menu.choose') }}</option>
                                <option value="male"
                                    {{ isset(Auth::user()->account->gender) && Auth::user()->account->gender == 'male' ? 'selected' : '' }}>
                                    {{ __('menu.male') }}
                                </option>
                                <option value="female"
                                    {{ isset(Auth::user()->account->gender) && Auth::user()->account->gender == 'female' ? 'selected' : '' }}>
                                    {{ __('menu.female') }}</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-1 text-right text-gray-700">{{ __('menu.country') }}</label>
                            <input type="text" value="{{ Auth::user()->account->country ?? '' }}" name="country"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                required>
                        </div>

                        <div>
                            <label class="block mb-1 text-right text-gray-700">{{ __('menu.city') }}</label>
                            <input type="text" name="city" value="{{ Auth::user()->account->city ?? '' }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                required>
                        </div>

                        <div>
                            <label class="block mb-1 text-right text-gray-700">{{ __('menu.current_address') }} </label>
                            <input type="text" name="current_address"
                                value="{{ Auth::user()->account->current_address ?? '' }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>

                        <div>
                            <label class="block mb-1 text-right text-gray-700"> {{ __('menu.permanent_address') }}</label>
                            <input type="text" name="permanent_address"
                                value="{{ Auth::user()->account->permanent_address ?? '' }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>

                        <div>
                            <label class="block mb-1 text-right text-gray-700">{{ __('menu.dob') }} </label>
                            <input type="date" name="dob" value="{{ Auth::user()->account->dob ?? '' }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                required>
                        </div>



                        <button type="submit" class="px-6 py-2 text-white bg-green-600 rounded hover:bg-green-700">
                            حفظ المعلومات
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.getAttribute('data-tab');

                document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('bg-green-600',
                    'text-white'));
                button.classList.add('bg-green-600', 'text-white');

                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });

                document.querySelector(`[data-content="${tab}"]`).classList.remove('hidden');
            });
        });
        document.getElementById("imageUpload").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("profileImage").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
