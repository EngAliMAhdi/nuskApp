@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        وسائل التواصل</a>
@endsection
@section('main_title_content', ' قائمة وسائل التواصل ')
@section('title_content', 'عرض')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header d-felx ">
                    <h6>وسائل التواصل </h6>
                    <a href="{{ route('social.edit') }}" class="btn btn-info btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> تعديل
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
                                                <h6 class="mb-0 text-sm">{{ $data->phone }}</h6>
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
                                                <h6 class="mb-0 text-sm">{{ $data->email }}</h6>
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
                                                <h6 class="mb-0 text-sm">{{ $data->facebook }}</h6>
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
                                                <h6 class="mb-0 text-sm">{{ $data->x }}</h6>
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
                                                <h6 class="mb-0 text-sm">{{ $data->instagram }}</h6>
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
                                                <h6 class="mb-0 text-sm">{{ $data->whatsapp }}</h6>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- model --}}
    <div class="modal fade" id="delete_reason">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center modal-title"> حذف البيانات</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="months_of_year_model_body">
                    <form action="{{ route('hotels.delete') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="delete_id">
                        <div class="form-group col-md-12">
                            <label for=""> سبب الحذف </label>
                            <textarea name="reason" class="form-control" cols="30" rows="10">{{ old('reason') }}</textarea>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End model --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.open-delete-modal').on('click', function() {

                let id = $(this).data('id');
                console.log(id);
                $('#delete_id').val(id);
            });
        });
    </script>
@endsection
