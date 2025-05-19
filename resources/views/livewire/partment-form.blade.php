<div class="h-full row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header">
                <h6>أضافة شقة</h6>
            </div>
            <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                @if ($show0)
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 form-group col-md-4">
                                <label class="form-label fw-bold">اسم الشقة</label>
                                <input type="text" wire:model="name" class="form-control form-control-sm"
                                    placeholder="">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 form-group col-md-4">
                                <label class="form-label fw-bold">المدينة</label>
                                <select class="px-5 form-select form-select-sm" wire:model="city">
                                    <option value="">اختر المدينة</option>
                                    <option value="madina">المدينة</option>
                                    <option value="makaa">مكة</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-4">
                                <label class="form-label fw-bold">الصورة</label>
                                <input type="file" wire:model="image" multiple class="form-control form-control-sm"
                                    placeholder="">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 form-group col-md-4">
                                <label class="form-label fw-bold">وصف</label>
                                <textarea wire:model="description" class="form-control form-control-sm" id="" cols="30" rows="4"></textarea>

                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-success btn-sm">التالي</button>
                        </div>
                    </form>
                @endif

                @if ($show)
                    <form wire:submit.prevent="saveSerivce">
                        @foreach ($rooms as $index => $room)
                            <div class="p-3 mb-3 bg-white border rounded shadow-sm card">
                                <h6 class="mb-3 fw-bold text-primary">خدمة {{ $index + 1 }}</h6>
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
                                        <input type="hidden" class="form-control form-control-sm"
                                            wire:model="rooms.{{ $index }}.hotel_id">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click="removeRoom({{ $index }})">حذف</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button type="button" class="mb-3 btn btn-success btn-sm" wire:click="addRoom">إضافة خدمة
                            جديدة</button>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-warning btn-sm">حفظ جميع الخدمات</button>
                        </div>
                    </form>
                @endif

                @if ($show1)
                    <form wire:submit.prevent="saveRoom">
                        @foreach ($rooms1 as $index => $room)
                            <div class="p-3 mb-3 bg-white border rounded shadow-sm card">
                                <h6 class="mb-3 fw-bold text-secondary">غرفة {{ $index + 1 }}</h6>
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="نوع الغرفة" wire:model="rooms1.{{ $index }}.type">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="رقم الغرفة" wire:model="rooms1.{{ $index }}.number">
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-select form-select-sm" multiple
                                            wire:model="rooms1.{{ $index }}.service">
                                            @foreach ($services as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control form-control-sm"
                                            placeholder="عدد الأسرة" wire:model="rooms1.{{ $index }}.beds">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-sm" placeholder="السعر"
                                            wire:model="rooms1.{{ $index }}.price">
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click="removeRoom1({{ $index }})">حذف</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button type="button" class="mb-3 btn btn-success btn-sm" wire:click="addRoom1">إضافة غرفة
                            جديدة</button>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-warning btn-sm">حفظ جميع الغرف</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
