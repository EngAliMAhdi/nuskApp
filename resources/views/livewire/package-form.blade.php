<div class="h-full row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header">
                <h6>أضافة باقة</h6>
            </div>
            <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                {{-- @if ($show0) --}}
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- Package Name --}}
                        <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold">اسم الباقة</label>
                            <input type="text" wire:model="name" class="form-control form-control-sm" placeholder="">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-3 ">
                            <label class="form-label fw-bold">نوع الباقة </label>
                            <select wire:model="type" class="form-select form-select-sm">
                                @foreach ($packageTypes as $type)
                                    <option value="">اختر نوع الباقة</option>
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('selected_services')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold">الصورة</label>
                            <input type="file" wire:model="image" class="form-control form-control-sm"
                                placeholder="">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold">مكان الانطلاق </label>
                            <input type="text" wire:model="place_departure" class="form-control form-control-sm"
                                placeholder="">
                            @error('place_departure')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold">الفندق</label>
                            <select wire:model.live="hotel_id" class="form-select form-select-sm">
                                <option value="">اختر الفندق</option>
                                @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                            @error('hotel_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold">المسافة عن الحرم </label>
                            <input type="text" wire:model="distance_hotel" class="form-control form-control-sm"
                                placeholder="">
                            @error('distance_hotel')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Room --}}
                        {{-- <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold">الغرفة</label>
                            <select wire:model.live="room_id" class="form-select form-select-sm">
                                <option value="">اختر الغرفة</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->type }}</option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        {{-- Transport Type --}}
                        <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold">نوع النقل</label>
                            <select wire:model.live="transport_type" class="form-select form-select-sm">
                                <option value="">اختر نوع النقل</option>
                                <option value="App\Models\LandTransport">بري</option>
                                <option value="App\Models\AirTransport">جوي</option>
                            </select>
                            @error('transport_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Transport Option --}}
                        <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold">وسيلة النقل</label>
                            <select wire:model.live="transport_id" class="form-select form-select-sm">
                                <option value="">اختر وسيلة النقل</option>
                                @foreach ($transportOptions as $option)
                                    <option value="{{ $option->id }}">
                                        {{ $option->name ? $option->name : $option->airplane }}</option>
                                @endforeach
                            </select>
                            @error('transport_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Seats --}}
                        <div class="mb-3 form-group col-md-2">
                            <label class="form-label fw-bold">عدد المقاعد</label>
                            <input type="number" wire:model="seats" class="form-control form-control-sm"
                                min="1">
                            @error('seats')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Services --}}
                        <div class="mb-3 form-group col-md-3 ">
                            <label class="form-label fw-bold">الخدمات الإضافية</label>
                            <select wire:model="selected_services" multiple class="form-select form-select-sm">
                                <option value="">اختر الخدمات</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            @error('selected_services')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Duration --}}


                        {{-- Validity --}}
                        <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold">تاريخ الانطلاق </label>
                            <input type="date" wire:model="valid_from" class="form-control form-control-sm">
                            @error('valid_from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-2">
                            <label class="form-label fw-bold">توقيت الحضور </label>
                            <input type="time" wire:model="time_arrival" class="form-control form-control-sm">
                            @error('time_arrival')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-2">
                            <label class="form-label fw-bold">توقيت الانطلاق </label>
                            <input type="time" wire:model="time_departure" class="form-control form-control-sm">
                            @error('time_departure')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 form-group col-md-3">
                            <label class="form-label fw-bold"> تاريخ العودة</label>
                            <input type="date" wire:model="valid_to" class="form-control form-control-sm">
                            @error('valid_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-2">
                            <label class="form-label fw-bold"> توقيت العودة</label>
                            <input type="time" wire:model="time_return" class="form-control form-control-sm">
                            @error('time_return')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-2">
                            <label class="form-label fw-bold">المدة (أيام)</label>
                            <input type="number" wire:model="duration_days" class="form-control form-control-sm"
                                min="1">
                            @error('duration_days')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div class="mb-3 form-group col-md-2">
                            <label class="form-label fw-bold">السعر الأساسي</label>
                            <input type="number" wire:model="base_price" class="form-control form-control-sm"
                                step="0.01">
                            @error('base_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Halal --}}
                        <div class="mb-3 form-group col-md-8">
                            <label class="form-label fw-bold">الوصف</label>
                            <textarea wire:model="description" class="form-control form-control-sm" rows="2"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 form-group col-md-8">
                            <label class="form-label fw-bold">نقاط التوقف الرئيسية</label>
                            <textarea wire:model="stop_points" class="form-control form-control-sm" rows="2"></textarea>
                            @error('stop_points')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 form-group col-md-8">
                            <label class="form-label fw-bold">ملاحظات </label>
                            <textarea wire:model="notes" class="form-control form-control-sm" rows="2"></textarea>
                            @error('stop_points')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        {{-- Submit --}}
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-success btn-sm">حفظ الباقة</button>
                        </div>
                    </div>
                </form>

                {{-- @endif --}}

            </div>
        </div>
    </div>
</div>
