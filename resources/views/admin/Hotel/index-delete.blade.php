@extends('layouts.admin')
@section('title', 'الفنادق ')
@section('main_title_content', ' قائمة الفنادق ')
@section('title_content', 'عرض')
@section('link_content')
    <a href="{{ route('hotels.index') }}"> الفنادق</a>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">بيانات الفنادق المحذوفة
                </h3>
            </div>
            <div class="overflow-auto card-body">
                @if (@isset($data) and !@empty($data) and count($data) > 0)
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="custom_thead">

                            <th> رقم الفندق</th>
                            <th>اسم الفندق</th>
                            <th>سبب الحذف</th>
                            <th>الحذف بواسطة</th>
                            <th>تاريخ الحذف</th>
                            <th>التحكم</th>

                        </thead>
                        <tbody>

                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>
                                        {{ $info->delete_reason }}
                                    <td>
                                        @if (@isset($info->updateby->username))
                                            {{ $info->updateby->username }}
                                        @else
                                            لم يتم التعديل
                                        @endif
                                    </td>
                                    <td>{{ $info->deleted_at }}</td>
                                    <td>
                                        <a href="{{ route('hotels.restore', $info->id) }}"
                                            class="btn btn-warning">استرجاع</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    <p class="text-center bg-danger">لا يوجد بيانات للنظام</p>
                @endif
            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection
