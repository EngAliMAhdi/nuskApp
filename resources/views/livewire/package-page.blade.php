<div class="row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header d-felx ">
                <h6> الباقات </h6>
                <a href="{{ Auth::user()->role == 'company' ? route('packages1.create') : route('packages.create') }}"
                    class="btn btn-info btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> إضافة باقة
                </a>

            </div>
            <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                <div class="m-auto mt-2 d-flex justify-content-between align-items-center w-75">
                    <div class="form-group" style="margin-left: 10px;">
                        <input type="text" class="border rounded form-control form-control-sm"
                            placeholder="ابحث عن اسم باقة ..." wire:model.live="name">
                    </div>
                </div>

                <div class="p-0 table-responsive">
                    <table class="table mb-0 align-items-center">
                        <thead>
                            <tr>
                                <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">اسم
                                    الباقة</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    الفندق</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    الغرفة</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    نوع النقل</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    السعر</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    تاريخ البداية</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    الحالة</th>
                                <th class="text-center text-secondary opacity-7" colspan="2">الإجراءات</th>
                            </tr>
                        </thead>

                        @if (isset($data) && $data->count() > 0)
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 text-sm text-center">{{ $item->name }}</h6>
                                        </td>

                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->hotel->name ?? '-' }}</p>
                                        </td>

                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->room->type ?? '-' }}</p>
                                        </td>

                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->transport_type == 'App\Models\LandTransport' ? 'بري' : 'جوي' }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ number_format($item->base_price, 2) }} ريال</p>
                                        </td>

                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->valid_from }}
                                                إلى {{ $item->valid_to }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->status != 'pending' ? 'نشط' : 'غير نشط' }}</p>
                                        </td>


                                        <td class="align-middle">
                                            <a href=""
                                                class="px-3 py-1 text-xs text-white btn badge badge-sm bg-gradient-success font-weight-bold">
                                                تعديل
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <button onclick="confirmDelete({{ $item->id }})"
                                                class="px-3 py-1 text-xs text-white btn badge badge-sm bg-gradient-danger font-weight-bold">
                                                حذف
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr>
                                    <td colspan="9" class="py-4 text-center text-muted">لا توجد باقات حتى الآن</td>
                                </tr>
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-center">
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</div>
@section('script')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن يمكنك التراجع بعد الحذف!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم، احذف!',
                cancelButtonText: 'إلغاء',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                reverseButtons: true,
                focusCancel: true,
                preConfirm: () => {
                    return true;
                }
            }).then((result) => {
                if (result.value) { // لاحظ استخدمنا result.value
                    console.log('تم التأكيد ✅');
                    window.Livewire.dispatch('delete-item', {
                        id: id
                    });
                } else {
                    console.log('تم الإلغاء ❌');
                }
            });
        }
    </script>
@endsection
