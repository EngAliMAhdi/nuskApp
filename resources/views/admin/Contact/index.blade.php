@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        التواصل </a>
@endsection
@section('main_title_content', ' قائمة التواصل ')
@section('title_content', 'عرض')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header d-felx ">
                    <h6> التواصل </h6>
                </div>
                <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>
                                <tr>
                                    <th
                                        class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                        الاسم</th>

                                    <th
                                        class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                        الهاتف</th>
                                    <th
                                        class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                        البريد الإلكتروني</th>
                                    <th
                                        class="text-sm text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                        الاستفسار</th>

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
                                                <h6 class="mb-0 text-sm text-center">{{ $item->phone }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm text-center">{{ $item->email }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm text-center">{{ $item->message }}</h6>
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
@endsection
@section('script')

@endsection
