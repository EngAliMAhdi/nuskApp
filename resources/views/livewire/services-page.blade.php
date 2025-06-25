<div class="row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header d-felx ">
                <h6>الخدمات الأخرى </h6>
                <a href="{{ route('services.create') }}" class="btn btn-info btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> إضافة خدمة
                </a>

            </div>
            <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                <div class="m-auto mt-2 d-flex justify-content-between align-items-center w-75">
                    <div class="form-group" style="margin-left: 10px;">
                        <input type="text" class="border rounded form-control form-control-sm"
                            placeholder="ابحث عن اسم خدمة ..." wire:model.live="name">
                    </div>
                </div>

                <div class="p-0 table-responsive">
                    <table class="table mb-0 align-items-center">
                        <thead>
                            <tr>
                                <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">اسم
                                    اسم الخدمة</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    سعر الكلفة</th>

                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    سعر البيع</th>


                                <th class="text-center text-secondary opacity-7" colspan="2">الإجراءات</th>
                            </tr>
                        </thead>

                        @if (@isset($data) && !@empty($data) && count($data) > 0)
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 text-sm text-center">{{ $item->name }}</h6>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->cost_price }}</p>
                                        </td>

                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->sale_price }}</p>
                                        </td>


                                        <td class="align-middle">
                                            <a href="{{ route('services.edit', $item->id) }}"
                                                class="px-3 py-1 text-xs text-white btn badge badge-sm bg-gradient-success font-weight-bold"
                                                data-toggle="tooltip" data-original-title="تعديل الخدمة">
                                                تعديل
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <button onclick="confirmDelete({{ $item->id }})"
                                                class="px-3 py-1 text-xs text-white btn badge badge-sm bg-gradient-danger font-weight-bold ">
                                                حذف
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
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
