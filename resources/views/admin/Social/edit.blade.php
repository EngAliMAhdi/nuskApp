@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        وسائل التواصل</a>
@endsection
@section('main_title_content', ' قائمة وسائل التواصل ')
@section('title_content', 'تعديل')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header d-felx ">
                    <h6>وسائل التواصل </h6>
                    <a href="{{ route('social.index') }}" class="btn btn-info btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> رجوع
                    </a>

                </div>
                <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">أسم
                                        الاسم
                                    </th>
                                    <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">
                                        الرابط
                                    </th>
                                </tr>
                            </thead>
                            @if (@isset($data))
                                <tbody>

                                    <form action="{{ route('social.update', $data->id) }}" method="post">
                                        @csrf

                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">

                                                        <h6 class="mb-0 text-sm">الهاتف</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="text"
                                                        value="{{ $data->phone }}" name="phone">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">الايميل</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="email"
                                                        value="{{ $data->email }}" name="email">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">فيس بوك</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="text"
                                                        value="{{ $data->facebook }}" name="facebook">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">موقع X</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="text"
                                                        value="{{ $data->x }}" name="x">
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">

                                                        <h6 class="mb-0 text-sm"> انستجرام</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="text"
                                                        value="{{ $data->instagram }}" name="instagram">
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="gap-3 px-2 py-1 d-flex">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"> واتس أب</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input class="form-control form-control-sm" type="text"
                                                        value="{{ $data->whatsapp }}" name="whatsapp">
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
