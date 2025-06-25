<div class="row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header d-felx ">
                <h6>الشقق</h6>
                <a href="{{ route('partment.create') }}" class="btn btn-info btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> إضافة شقة
                </a>

            </div>
            <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                <div class="m-auto mt-2 d-flex justify-content-between align-items-center w-75">
                    <div class="form-group" style=" margin-left: 10px;">
                        <input type="text" class="border rounded form-control form-control-sm"
                            placeholder="ابحث عن اسم شقة ..." wire:model.live="name">
                    </div>
                    <div class="text-sm form-group" style=" margin-right: 10px;">
                        <select name="city" id="city" class="px-5 border rounded form-select form-select-sm"
                            wire:model.live="city">
                            <option value="">اختر المدينة</option>
                            <option value="makaa">مكة</option>
                            <option value="madina">المدينة</option>
                        </select>
                    </div>
                </div>
                <div class="p-0 table-responsive">
                    <table class="table mb-0 align-items-center">
                        <thead>
                            <tr>
                                <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">
                                    أسم
                                    الشقة
                                </th>

                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                    المدينة</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    أُضيف بواسطة</th>
                                <th
                                    class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    عُدل بواسطة</th>
                                <th class="text-center text-secondary opacity-7" colspan="2">الإجراءات</th>
                            </tr>
                        </thead>
                        @if (@isset($data) and !@empty($data) and count($data) > 0)

                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div class="gap-3 px-2 py-1 text-center d-flex">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                @if ($item->city == 'makaa')
                                                    مكة
                                                @else
                                                    المدينة
                                                @endif
                                            </p>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                {{ $item->addedby->username }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm text-center font-weight-bold">
                                                @if (@isset($item->updateby->username))
                                                    {{ $item->updateby->username }}
                                                @else
                                                    لم يتم التعديل
                                                @endif
                                            </p>
                                        </td>

                                        <td class="align-middle">
                                            <a href="{{ route('hotels.edit', $item->id) }}"
                                                class="px-3 py-1 text-xs text-white badge badge-sm bg-gradient-success font-weight-bold"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                تعديل
                                            </a>

                                        </td>
                                        <td class="align-middle">
                                            <a href="#" data-id="{{ $item->id }}" data-toggle="modal"
                                                data-target="#delete_reason"
                                                class="px-3 py-1 text-xs text-white badge badge-sm bg-gradient-danger font-weight-bold open-delete-modal">
                                                حذف
                                            </a>

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
