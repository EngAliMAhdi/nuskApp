@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        تفاصيل الاستفسار
    </a>
@endsection
@section('main_title_content', 'تفاصيل الاستفسار')
@section('title_content', 'عرض كامل')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header d-felx ">
                    <h6>تفاصيل الاستفسار</h6>
                    <a href="{{ route('contact.index') }}" class="btn btn-info btn-sm">
                        <i class="bi bi-arrow-left me-1"></i> رجوع
                    </a>
                </div>
                <div class="px-0 pt-0 pb-2 card-body min-vh-50">
                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center">
                            <tbody>
                                <tr>
                                    <th class="text-sm text-center">الاسم</th>
                                    <td class="text-sm text-center">{{ $item->name }}</td>
                                </tr>
                                <tr>
                                    <th class="text-sm text-center">الهاتف</th>
                                    <td class="text-sm text-center">{{ $item->phone }}</td>
                                </tr>
                                <tr>
                                    <th class="text-sm text-center">البريد الإلكتروني</th>
                                    <td class="text-sm text-center">{{ $item->email }}</td>
                                </tr>
                                <tr>
                                    <th class="text-sm text-center">الاستفسار</th>
                                    <td class="text-sm text-center">{{ $item->message }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection 