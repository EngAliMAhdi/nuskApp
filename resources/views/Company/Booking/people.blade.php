@extends('layouts.main1')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        الحجوزات</a>
@endsection
@section('main_title_content', ' بيانات الافراد ')
@section('title_content', 'عرض')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header d-felx ">
                    <h6>بيانات الأفراد </h6>
                    {{-- <a href="{{ route('air.create') }}" class="btn btn-info btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> إضافة طائرة
                </a> --}}

                </div>
                <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                    {{-- <div class="m-auto mt-2 d-flex justify-content-between align-items-center w-75">
                    <div class="form-group" style="margin-left: 10px;">
                        <input type="text" class="border rounded form-control form-control-sm"
                            placeholder="ابحث عن اسم طائرة ..." wire:model.live="name">
                    </div>
                </div> --}}

                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">اسم
                                        الأول</th>
                                    <th
                                        class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                        اسم العائلة</th>

                                    <th
                                        class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                        الرقم القومي </th>
                                    <th
                                        class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                        الجنسية </th>
                                    <th
                                        class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                        تاريخ الميلاد </th>
                                    <th
                                        class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                        السعر</th>
                                </tr>
                            </thead>

                            @if (@isset($data) && !@empty($data) && count($data) > 0)
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    {{ $item->first_name }}</div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-sm text-center font-weight-bold">
                                                    {{ $item->last_name }}</p>
                                            </td>

                                            <td>
                                                <p class="mb-0 text-sm text-center font-weight-bold">
                                                    {{ $item->national_id }}</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-sm text-center font-weight-bold">
                                                    {{ $item->nationality }}</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-sm text-center font-weight-bold">
                                                    {{ $item->birth_date }}</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-sm text-center font-weight-bold">
                                                    {{ $item->price }}</p>
                                            </td>
                                            {{-- <td class="align-middle">
                                                <a href="{{ route('air.edit', $item->id) }}"
                                                    class="px-3 py-1 text-xs text-white btn badge badge-sm bg-gradient-success font-weight-bold"
                                                    data-toggle="tooltip" data-original-title="تعديل الطائرة">
                                                    تعديل
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <button onclick="confirmDelete({{ $item->id }})"
                                                    class="px-3 py-1 text-xs text-white btn badge badge-sm bg-gradient-danger font-weight-bold ">
                                                    حذف
                                                </button>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
                {{-- <div class="mt-4 d-flex justify-content-center">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div> --}}

            </div>
        </div>

    </div>


@endsection
@section('script')

@endsection
