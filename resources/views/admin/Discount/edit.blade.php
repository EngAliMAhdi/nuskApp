@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        ضبط التسعير</a>
@endsection
@section('main_title_content', ' قائمة ضبط التسعير ')
@section('title_content', 'تعديل')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header d-felx ">
                    <h6>ضبط التسعير</h6>
                    <a href="{{ route('discount.index') }}" class="btn btn-info btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> رجوع
                    </a>

                </div>
                <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">أسم
                                        التنصيف
                                    </th>
                                    <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">
                                        نسبة الخصم
                                    </th>
                                </tr>
                            </thead>
                            @if (@isset($data))
                                <tbody>

                                    <form action="{{ route('discount.update', $data->id) }}" method="post">
                                        @csrf
                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">الشركات</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="number"
                                                        value="{{ $data->d_company }}" name="d_company">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">الافراد</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="number"
                                                        value="{{ $data->d_person }}" name="d_person">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">أطفال أقل من سنتين</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="number"
                                                        value="{{ $data->d_under_two }}" name="d_under_two">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">أطفال من سنتين الى عشرة </h6>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="number"
                                                        value="{{ $data->d_between_two_ten }}" name="d_between_two_ten">
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="text-center col-md-12">
                                                    <button type="submit" class="btn btn-warning btn-sm">تعديل</button>
                                                </div>
                                            </td>
                                        </tr>
                                        </from>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- model --}}

    {{-- End model --}}
@endsection
@section('script')

@endsection
