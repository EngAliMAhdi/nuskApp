<div class="h-full row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header">
                <h6>تعديل وسيلة نقل</h6>
            </div>
            <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                @if ($show0)
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 form-group col-md-4">
                                <label class="form-label fw-bold">وسيلة النقل </label>
                                <input type="text" wire:model="name" class="form-control form-control-sm"
                                    placeholder="">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 form-group col-md-4">
                                <label class="form-label fw-bold">السائقين</label>
                                <select class="px-5 form-select form-select-sm" multiple wire:model="drivers">
                                    <option value="">اختر السائق</option>
                                    @if ($drivers1)
                                        @foreach ($drivers1 as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    @endif
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-4">
                                <label class="form-label fw-bold">السعر</label>
                                <input type="number" wire:model="price" class="form-control form-control-sm"
                                    placeholder="">

                            </div>

                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-success btn-sm">التالي</button>
                        </div>
                    </form>
                @endif

                @if ($show)
                    <form wire:submit.prevent="editService">
                        @foreach ($rooms as $index => $room)
                            <div class="p-3 mb-3 bg-white border rounded shadow-sm card">
                                {{-- <h6 class="mb-3 fw-bold text-primary">خدمة {{ $index + 1 }}</h6> --}}
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="اسم الخدمة" wire:model="rooms.{{ $index }}.name">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-sm" placeholder="السعر"
                                            wire:model="rooms.{{ $index }}.price">
                                    </div>

                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click="removeService1({{ $rooms[$index]['id'] }})">حذف</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </form>



                    <form wire:submit.prevent="saveService">
                        @foreach ($rooms1 as $index => $room)
                            <div class="p-3 mb-3 bg-white border rounded shadow-sm card">
                                <h6 class="mb-3 fw-bold text-primary">خدمة {{ $index + 1 }}</h6>
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="اسم الخدمة" wire:model="rooms1.{{ $index }}.name">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-sm" placeholder="السعر"
                                            wire:model="rooms1.{{ $index }}.price">
                                    </div>

                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click="removeService({{ $index }})">حذف</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button type="button" class="mb-3 btn btn-success btn-sm" wire:click="addService">إضافة خدمة
                            جديدة</button>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-sm">حفظ جميع الخدمات</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
