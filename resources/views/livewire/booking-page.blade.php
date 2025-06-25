<div class="row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header d-felx ">
                <h6>الحجوزات </h6>

            </div>
            <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                <div class="m-auto mt-2 d-flex justify-content-between align-items-center w-75">
                    <div class="form-group" style="margin-left: 10px;">
                        <select class="border rounded form-control form-control-sm" wire:model.live="name">
                            @foreach ($users as $item)
                                <option value="{{ $item->user->id }}">{{ $item->user->username }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="p-0 table-responsive">
                    <table class="table mb-0 align-items-center">
                        <thead>
                            <tr>
                                <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">
                                    اسم المستخدم</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    اسم الباقة </th>

                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    عدد الأفراد</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    المبلغ الاجمالي </th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    حالة الحجز </th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    طريقة الدفع </th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    حالة الدفع </th>

                                <th class="text-center text-secondary opacity-7" colspan="2">الإجراءات</th>
                            </tr>
                        </thead>

                        @if (@isset($data) && !@empty($data) && count($data) > 0)
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                {{ $item->user->username }}</div>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->package->name }}</p>
                                        </td>

                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ count($item->people) }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->total_price }}</p>
                                        </td>
                                        <td>
                                            <select wire:change="updateStatus({{ $item->id }}, $event.target.value)"
                                                class="form-select">
                                                <option value="pending"
                                                    {{ $item->status == 'pending' ? 'selected' : '' }}>قيد الانتظار
                                                </option>
                                                <option value="processing"
                                                    {{ $item->status == 'processing' ? 'selected' : '' }}>قيد المعالجة
                                                </option>
                                                <option value="cancelled"
                                                    {{ $item->status == 'cancelled' ? 'selected' : '' }}>ملغي
                                                </option>

                                            </select>

                                        </td>
                                        <td>
                                            <select
                                                wire:change="updateMethod({{ $item->id }}, $event.target.value)"
                                                class="form-select">
                                                <option value="cash"
                                                    {{ $item->method_paid == 'cash' ? 'selected' : '' }}>دفع كاش
                                                </option>
                                                <option value="credit_card"
                                                    {{ $item->method_paid == 'credit_card' ? 'selected' : '' }}>دفع
                                                    مسبق</option>
                                            </select>

                                        </td>
                                        <td>
                                            <select
                                                wire:change="updatePaymentStatus({{ $item->id }}, $event.target.value)"
                                                class="form-select">
                                                <option value="pending"
                                                    {{ $item->payment_status == 'pending' ? 'selected' : '' }}>قيد
                                                    الانتظار
                                                </option>
                                                <option value="paid"
                                                    {{ $item->payment_status == 'paid' ? 'selected' : '' }}>تم الدفع
                                                </option>
                                            </select>

                                        </td>

                                        <td class="align-middle">
                                            <a href="{{ route('package.pepole', $item->id) }}"
                                                class="px-3 py-1 text-xs text-white btn badge badge-sm bg-gradient-info font-weight-bold"
                                                data-toggle="tooltip" data-original-title="تعديل الطائرة">
                                                بيانات الأفراد
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
