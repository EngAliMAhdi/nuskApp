<div class="row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header d-felx ">
                <h6> وسائل النقل البري</h6>
                <a href="{{ route('transport.create') }}" class="btn btn-info btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> إضافة وسيلة نقل
                </a>

            </div>
            <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                <div class="m-auto mt-2 d-flex justify-content-between align-items-center w-75">
                    <div class="form-group" style=" margin-left: 10px;">
                        <input type="text" class="border rounded form-control form-control-sm"
                            placeholder="ابحث عن اسم  ..." wire:model.live="name">
                    </div>

                </div>
                <div class="p-0 table-responsive">
                    <table class="table mb-0 align-items-center">
                        <thead>
                            <tr>
                                <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">أسم
                                    وسيلة النقل
                                </th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    السعر
                                </th>
                                <th class="text-center text-secondary opacity-7" colspan="2">الإجراءات</th>
                            </tr>
                        </thead>
                        @if (@isset($data) and !@empty($data) and count($data) > 0)

                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div class="gap-3 px-2 py-1 d-flex">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->price }}
                                            </p>
                                        </td>



                                        <td>
                                            <a href="{{ route('transport.edit', $item->id) }}"
                                                class="px-3 py-2 text-xs text-white btn badge badge-sm bg-gradient-success font-weight-bold"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                تعديل
                                            </a>

                                        </td>
                                        <td>
                                            <button onclick="confirmDelete({{ $item->id }})"
                                                class="px-3 py-2 text-xs text-white btn badge badge-sm bg-gradient-danger font-weight-bold open-delete-modal">
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
